<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validação
        $request->validate([
            'name' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Atualiza o nome do usuário
        $user->name = $request->name;

        // Atualiza a foto do perfil, se houver
        if ($request->hasFile('profile_picture')) {
            // Exclui a foto antiga, se existir
            if ($user->profile_picture && Storage::exists($user->profile_picture)) {
                Storage::delete($user->profile_picture);
            }

            // Salva a nova foto
            $filePath = $request->file('profile_picture')->store('profile_pictures');
            $user->profile_picture = $filePath;
        }

        // Salva as alterações
        $user->save();

        return redirect()->route('recipes.index')->with('success', 'Perfil atualizado com sucesso!');
    }
}
