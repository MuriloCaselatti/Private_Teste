<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Recipe;

class ReviewController extends Controller
{
    public function store(Request $request, $recipeId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        // Verificar se a receita existe
        $recipe = Receita::findOrFail($recipeId);

      
      

        return redirect()->route('recipes.show', $recipeId)->with('success', 'Review added successfully.');
    }
}
