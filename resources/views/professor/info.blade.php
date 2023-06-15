@extends('layouts.navbar')

@section('conteudo')
    <div class="card mt-3">
        <div class="card-header">
            Detalhes da conta <button class="btn btn-warning btn-sm" id="editarStudent">editar</button>
        </div>
        <div class="card-body">
            <form action="{{route('teacher.update', $user->id)}}" method="post">
                @method('PUT')
                @csrf
                <ul>
                    <li>
                        <label for="exampleInputPassword1" class="form-label">Nome:</label>
                        <input type="text" id="editName" name="name" value="{{ $user->name }}" disabled>
                    </li>
                    <li>
                        <label for="exampleInputPassword1" class="form-label">Email: {{ $user->email }}</label>
                    </li>
                    <li>
                        atividades criadas:{{ $atividades }}
                    </li>
                </ul>
                <button class="btn btn-primary btn-sm">Confirmar</button>
            </form>
        </div>
    </div>
@endsection
