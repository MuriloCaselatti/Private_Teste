@extends('layouts.app')

@section('title', 'Recipe Details')

@section('content')
    <div class="container">
        @if ($recipe)
            <h1>{{ $recipe->title }}</h1>

            <p><strong>Description:</strong> {{ $recipe->description }}</p>

            <h3>Ingredients:</h3>
            <ul>
                @foreach(explode(',', $recipe->ingredients) as $ingredient)
                    <li>{{ trim($ingredient) }}</li>
                @endforeach
            </ul>

            <h3>Steps:</h3>
            <ol>
                @foreach(explode(',', $recipe->steps) as $step)
                    <li>{{ trim($step) }}</li>
                @endforeach
            </ol>

            @if (Auth::check() && $recipe->user_id === Auth::id())
                <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif
        @else
            <p>Recipe not found.</p>
        @endif
    </div>
@endsection
