@extends('layouts.navbar')

@section('conteudo')
<div class="card mt-3">
    <div class="card-header">
      Detalhes da conta
    </div>
    <div class="card-body">
        <ul>
            <li >
                nome: {{$user->name}}
            </li>
            <li class="mt-2">
                email: {{$user->email}} 
            </li>
            <li class="mt-2">
                atividades respondidas: {{$atividades}}
            </li>
            <li class="mt-2">
                @if ($user->status == 1)
                Status da conta: <span class="btn btn-success" disabled>Ativado</span>
                @else
                Status da conta: <span class="btn btn-danger" disabled>Desativado</span>
                @endif
            </li>
        </ul>
    </div>
  </div>
@endsection
