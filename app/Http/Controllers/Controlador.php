<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controlador extends Controller
{
    /**
     * Display a listing of the resource with search functionality.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $userId = Auth::id();

        if ($search) {
            // Procura receitas que correspondem ao termo de busca
            $recipes = Receita::where('title', 'like', '%' . $search . '%')
                ->where(function ($query) use ($userId) {
                    $query->where('user_id', $userId)
                        ->orWhereIn('user_id', Receita::where('title', 'like', '%' . request('search') . '%')->pluck('user_id'));
                })
                ->get();
        } else {
            // Obtém apenas as receitas do usuário autenticado
            $recipes = Receita::where('user_id', $userId)->get();
        }

        // Retorna a view com as receitas e o termo de busca
        return view('recipes.index', compact('recipes', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'ingredients' => 'required',
            'steps' => 'required',
        ]);

        // Verifica se o usuário está autenticado
        if (!Auth::check()) {
            return redirect()->route('recipes.create')->with('error', 'Você deve estar autenticado para adicionar uma receita.');
        }

        // Cria a nova receita
        Receita::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'ingredients' => $validated['ingredients'],
            'steps' => $validated['steps'],
            'user_id' => Auth::id(), // Adiciona o ID do usuário
        ]);

        // Redireciona para a lista de receitas com uma mensagem de sucesso
        return redirect()->route('recipes.index')->with('success', 'Receita adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Encontre a receita pelo ID e carregue o usuário
        $recipe = Receita::with('user')->findOrFail($id);

        // Retorne a view com a receita
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Encontra a receita pelo ID
        $recipe = Receita::findOrFail($id);

        // Verifica se o usuário é o dono da receita
        if ($recipe->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Retorna a view para editar a receita
        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validação dos dados enviados
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
        ]);

        // Encontra a receita pelo ID
        $recipe = Receita::findOrFail($id);

        // Verifica se o usuário é o dono da receita
        if ($recipe->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Atualiza a receita com os dados validados
        $recipe->update([
            'title' => $request->title,
            'description' => $request->description,
            'ingredients' => $request->ingredients,
            'steps' => $request->steps,
        ]);

        // Redireciona para a lista de receitas com mensagem de sucesso
        return redirect()->route('recipes.index')->with('success', 'Receita atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Encontra a receita pelo ID
        $recipe = Receita::findOrFail($id);

        // Verifica se o usuário é o dono da receita
        if ($recipe->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Exclui a receita
        $recipe->delete();

        // Redireciona para a lista de receitas com mensagem de sucesso
        return redirect()->route('recipes.index')->with('success', 'Receita excluída com sucesso!');
    }
}
