@extends('layouts.navbar')

@section('conteudo')

<div class="container mt-4  bg-dark-subtle" style="width: 70%">
   <h4 > Informaçoes da conta</h4>

    <ul>
        <li>
            nome: {{$user->name}}
        </li>
        <li>
            email: {{$user->email}}
        </li>
        <li>
            Disciplinas vinculadas:
        </li>
        <li>
            atividades criadas: 
        </li>
    </ul>

</div>

@endsection
