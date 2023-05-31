@extends('layouts.navbar')

@section('conteudo')

    <form action="{{ route('activities.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input type="text" class="form-control"  name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descrição</label>
            <input type="text" class="form-control" name="description" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Professor:</label>
            <label for="exampleInputPassword1" class="form-control">{{ $user->name }}</label>
            <input type="hidden" class="form-control" name="teatcher_id"  value="{{ $user->id }}">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Arquivo</label>
            <input class="form-control" name="filepath" type="file" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Disciplina:</label>
            <label for="exampleInputPassword1" class="form-control bg-secondary-subtle">{{ $disciplines->name }}</label>
            <input type="hidden" class="form-control " name="discipline_id" value="{{ $disciplines->id }}">
        </div>
        <button class="btn btn-primary mt-2">Submit</button>
    </form>

@endsection
