@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Exibe o nome do usuário no topo -->
    <div class="user-info">
        @if (auth()->check())
            <h1>Bem-Vindo, {{ auth()->user()->name }}!</h1>
        @else
            <h1>Bem-Vindo, visitante!</h1>
        @endif
    </div>

    <!-- Formulário de busca -->
    <form action="{{ route('recipes.index') }}" method="GET">
        <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Buscar receitas...">
        <button type="submit">Buscar</button>
    </form>

    <h2>Suas Receitas</h2>
    <a href="{{ route('recipes.create') }}" class="btn-add-recipe">Adicionar Nova Receita</a>

    <!-- Lista as receitas em grade -->
    <div class="recipe-grid">
        @forelse ($recipes as $recipe)
            <div class="recipe">
                <h3>{{ $recipe->title }}</h3>
                <!-- Outros detalhes da receita -->
            </div>
        @empty
            <p>Nenhuma receita encontrada.</p>
        @endforelse
    </div>

</div>

@endsection
