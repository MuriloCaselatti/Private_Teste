{{-- resources/views/recipes/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Add New Recipe</h1>

    <form action="{{ route('recipes.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Titulo da Receita:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Descrição:</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
            @error('description')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="ingredients">Ingredientes:</label>
            <textarea id="ingredients" name="ingredients" required>{{ old('ingredients') }}</textarea>
            @error('ingredients')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="steps">Etapas:</label>
            <textarea id="steps" name="steps" required>{{ old('steps') }}</textarea>
            @error('steps')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Adicionar Receita</button>
    </form>
@endsection
