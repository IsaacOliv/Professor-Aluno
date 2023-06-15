@extends('layouts.navbar')


@section('conteudo')
    {{-- enctype="multipart/form-data" --}}
    <form action="{{ route('students.activitie.update', $activitie->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3 mt-3">
            <input type="hidden" class="form-control" name="activity_id" value="{{ $activitie->activity_id }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Aluno</label>
            <label for="exampleInputPassword1" class="form-control">{{ $user->name }}</label>
            <input type="hidden" class="form-control" name="student_id" value="{{ $user->id }}">
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control" name="check" value="0">
        </div>

        @if ($activitie->filepath)
            <a class="btn btn-lg btn-primary" href="{{ url("storage/{$activitie->filepath}") }}" target="_blank"> Baixar
                Arquivo</a>
        @endif
        <div class="mb-3">
            <label for="formFile" class="form-label">Ainda não é possivel editar arquivo</label>

        </div>
        {{-- <div class="mb-3">
            <label for="formFile" class="form-label">Arquivo</label>
            <input class="form-control" name="filepath" type="file">
        </div> --}}
        <label for="exampleInputPassword1">Descrição</label>
        <textarea class="mt-2" name="description" id="trumbowyg-demo" cols="30" rows="10">{{ $activitie->description }}</textarea>

        <button class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
