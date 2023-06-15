@extends('layouts.navbar')


@section('conteudo')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
    {{-- enctype="multipart/form-data" --}}
    
    <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
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
            <input type="hidden" class="form-control" name="check" value="0">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Arquivo</label>
            <input class="form-control" name="filepath" type="file">
        </div>
        <label for="exampleInputPassword1">Descrição</label>
        <textarea class="mt-2" name="description" id="trumbowyg-demo" cols="30" rows="10"></textarea>

        <button class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
