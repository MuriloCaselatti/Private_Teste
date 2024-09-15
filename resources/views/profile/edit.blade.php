@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profile</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required>
        </div>

        <div>
            <label for="profile_picture">Foto de Perfil:</label>
            <input type="file" name="profile_picture" id="profile_picture">
        </div>

        <button type="submit">Atualizar Perfil</button>
    </form>
</div>
@endsection
