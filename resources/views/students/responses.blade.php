@extends('layouts.navbar')


@section('conteudo')
{{-- enctype="multipart/form-data" --}}
    <form action="{{ route('students.responsesStore') }}" method="post" >
        @csrf
        <div class="mb-3 mt-3">
            <label for="exampleInputPassword1" class="form-label">Titulo</label>
            <label for="exampleInputPassword1" class="form-control">{{ $activities->name }}</label>
            <input type="hidden" class="form-control" name="activity_id" value="{{ $activities->id }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Aluno</label>
            <label for="exampleInputPassword1" class="form-control">{{ $user->name }}</label>
            <input type="hidden" class="form-control" name="student_id" value="{{ $user->id }}">
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control" name="enum" value="0">
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <input type="text" class="form-control" name="description">
        </div>
        {{-- <div class="mb-3">
            <label for="formFile" class="form-label">Arquivo</label>
            <input class="form-control" name="filepath" type="file">
        </div> --}}
        <button class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
