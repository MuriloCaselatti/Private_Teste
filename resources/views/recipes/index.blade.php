@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Exibe o nome e a foto do usuário no topo -->
    <div class="user-info">
        @php
            // Verifique se a imagem do perfil existe
            $profilePicturePath = auth()->user()->profile_picture;
            $profilePictureUrl = $profilePicturePath ? asset('storage/' . $profilePicturePath) : asset('default-profile.png');
        @endphp
        <img src="{{ $profilePictureUrl }}" alt="{{ auth()->user()->name }}" class="profile-picture">
        <h1>Bem-Vindo, {{ auth()->user()->name }}!</h1>
        
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
                <p>{{ $recipe->description }}</p>
                <p>Created by: {{ $recipe->user->name }}</p> <!-- Mostra o nome do usuário que criou a receita -->
                <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-view-details">Detalhes</a>
                @if ($recipe->user_id === auth()->id())
                    <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-edit">Editar</a>
                    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete">Excluir</button>
                    </form>
                @endif
            </div>
        @empty
            <p>Não encontramos essa receita....</p>
        @endforelse
    </div>
</div>
@endsection
