@extends('layouts.navbar')


@section('conteudo')
    @csrf
    @method('PUT')
    <div class="mb-3 mt-3">
        <input type="hidden" class="form-control" name="activity_id" value="{{ $activities->activity_id }}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Aluno</label>
        <label for="exampleInputPassword1" class="form-control">{{ $activities->student->name }}</label>
        <input type="hidden" class="form-control" name="student_id" value="{{ $user->id }}">
    </div>
    <div class="mb-3">

        @if ($activities->check == '1')
        <span class="badge text-bg-success">Visto</span>
        @endif
    </div>
    <div class="form-floating mb-5">
        <input type="text" value=" nota: {{$activities->note }}" disabled>
    </div>
    @if ($activities->filepath)
        <a class="btn btn-lg btn-primary mb-3 mt-2" href="{{ url("storage/{$activities->filepath}") }}" target="_blank">
            Baixar
            Arquivo</a>
    @endif
    <textarea class="mt-2" name="description" id="trumbowyg-demo" disabled cols="30" rows="10">{{ $activities->description }}</textarea>
    <input type="hidden" name="description" value="{{ $activities->description }}">
    <button class="btn btn-primary mt-2">Submit</button>
@endsection
