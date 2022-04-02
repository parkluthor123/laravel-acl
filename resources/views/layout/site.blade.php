<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/materialize.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CRUD Produtos</title>
    <script src="{{ URL::to('js/materialize.min.js') }}"></script>
</head>
<body>
    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <div class="navbar-wrapper">
                    <a href="{{ route('welcome') }}" class="brand-logo" style="position: static">Products</a>
                    @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
                        <a href="{{ route('doLogout') }}" class="waves-effect waves-light btn" style="height: auto !important">
                            <i class="material-icons">power_settings_new</i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <main>
        @yield("content")
    </main>
</body>
</html>
