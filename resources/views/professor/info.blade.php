@extends('layouts.navbar')

@section('conteudo')
    <div class="card mt-3">
        <div class="card-header">
            Detalhes da conta <button class="btn btn-warning btn-sm" id="editarStudent">editar</button>
        </div>
        <div class="card-body">
            <form action="" method="post">
                @method('PUT')
                @csrf
                <ul>
                    <li>
                        <label for="exampleInputPassword1" class="form-label">Nome:</label>
                        <input type="text" id="editName" value="{{ $user->name }}" disabled>
                    </li>
                    <li>
                        <label for="exampleInputPassword1" class="form-label">Email:</label>
                        <input type="text" id="editEmail" value="{{ $user->email }}" disabled>
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
