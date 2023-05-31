@extends('layouts.account')


<style>
    .botoes a {
        text-decoration: none;
        padding: 15px 75px;
        font-size: 30px;
        color: #ffffff;
        font-family: arial;
        background: #2981bc;
        border-radius: 2px;
    }

    a.a1 {
        background: #34495e;
    }
    .user_type{
        height: 45px;
        width: 200px;
        font-size: 20px;
        background: none;
        border: 1px solid #3498db;
        border-radius: 2px;
        padding: 0 10px;
        margin-left: 35px;
        outline: none;
        color: #7dbde8;
        margin-top: 2%;

    }
</style>
@section('login')
    <div class="header">Login</div>
    <form action="{{ route('logar') }}" method="post">
        @csrf
        <input class="email" name="email" type="text" id="email" placeholder="Email">
        <input class="password" name="password" id="password" type="password" placeholder="Senha">
        <button class="button" type="submit">Entrar</button>
    </form>
@endsection
