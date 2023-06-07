@extends('layouts.navbar')

@section('conteudo')
    <div class="card mt-3">
        <div class="card-header">
            Detalhes da conta <button class="btn btn-warning btn-sm" id="editarStudent">editar</button>
            <div class="position-absolute top-0 end-0 mt-2 me-2">
                @if ($student->status === 1)
                    Status da conta: <button onclick="studentDisable({{$student->id}})" name="status"
                        class="btn btn-success btn-sm">Ativado</button>
                @else
                    Status da conta: <button onclick="studentActive({{$student->id}})" id="studentStatus1" name="status"
                        class="btn btn-danger btn-sm">Desativado</button>
                @endif
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('teacher.update.student', $student->id) }}" method="post">
                @method('PUT')
                @csrf
                <ul>
                    <li>
                        <label for="exampleInputPassword1" class="form-label">Nome:</label>
                        <input type="text" id="editName" name="name" value="{{ $student->name }}" disabled>
                    </li>
                    <li>
                        <label for="exampleInputPassword1" class="form-label">Email:</label>
                        <input type="text" id="editEmail" name="email" value="{{ $student->email }}" disabled>
                    </li>
                    <li class="mt-2">
                        atividades respondidas:
                    </li>

                </ul>
                <button class="btn btn-primary btn-sm">Confirmar</button>
            </form>
        </div>
    </div>
@endsection
