@extends('layouts.app')

@section('title', 'Edit Recipe')

@section('content')
    <div class="container">
        <h1>Editar Receita</h1>

        <!-- Formulário de edição -->
        <div class="edit-recipe-form">
            @include('recipes.partials.form', [
                'route' => route('recipes.update', $recipe->id),
                'method' => 'PUT'
            ])
        </div>
    </div>
@endsection
