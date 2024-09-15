<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Receitas Private')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">


</head>
<body>
    <header>
        <!-- Aqui você pode colocar seu cabeçalho -->
        <nav>
            <ul>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
                <a href="{{ route('profile.edit') }}">Editar Perfil</a>
                <a href="/recipes">Receitas</a>
            </form>
                
            </ul>
        </nav>
    </header>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <!-- Aqui você pode colocar seu rodapé -->
        <p>© {{ date('Y') }} Receitas Private</p>
    </footer>
</body>
</html>
