<!-- resources/views/recipes/partials/form.blade.php -->

<form action="{{ $route }}" method="POST">
    @csrf
    @method($method)

    <!-- Título da Receita -->
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $recipe->title) }}" class="form-control" required>
    </div>

    <!-- Descrição da Receita -->
    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description', $recipe->description) }}</textarea>
    </div>

    <!-- Ingredientes -->
    <div class="form-group">
        <label for="ingredients">Ingredients</label>
        <textarea id="ingredients" name="ingredients" class="form-control" rows="4" required>{{ old('ingredients', $recipe->ingredients) }}</textarea>
    </div>

    <!-- Etapas -->
    <div class="form-group">
        <label for="steps">Steps</label>
        <textarea id="steps" name="steps" class="form-control" rows="4" required>{{ old('steps', $recipe->steps) }}</textarea>
    </div>

    <!-- Botões de Ação -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update Recipe</button>
        <a href="{{ route('recipes.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>
