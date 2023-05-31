@extends('layouts.navbar')


@section('conteudo')
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label"></label>
        <input class="form-control" id="exampleFormControlInput1" value="{{ $activities->name }}" disabled>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"></label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>{{ $activities->description }}</textarea>
    </div>
    <a class="btn btn-lg btn-success" href="{{ url("storage/{$activities->filepath}") }}" target="_blank"> Baixar
        Arquivo</a>
    <hr>
    
@endsection
