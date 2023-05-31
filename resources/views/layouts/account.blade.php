<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <title>Account</title>
</head>

<body>
    <div class="center">
        <div class="container mt-3">
        <div class="botoes">
            <a class="a1"href="{{route('register')}}">Cadastrar</a>
            <a class="a2"href="{{route('login')}}">Entrar</a>
        </div>
        <div class="cadastro-form">
            
                @yield('register')
        </div>
        <div class="login-form">
            @yield('login')
        </div>
</div>
</body>

</html>
