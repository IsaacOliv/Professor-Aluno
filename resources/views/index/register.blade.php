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

    a.a2 {
        background: #34495e;
    }
</style>
@section('register')
    <div class="container">
        <div class="header">Register</div>
        <form action="{{ route('create') }}"  method="post">
            @csrf
            <input class="name" name="name" type="text" placeholder="Nome" autocomplete="off">
            <input class="email" name="email" type="text" placeholder="Email"autocomplete="off">
            <input class="password" name="password" type="password" placeholder="Senha" autocomplete="off">
            <button class="button" type="submit">Confirmar</button>
        </form>
    </div>
@endsection
