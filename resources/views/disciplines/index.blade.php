@extends('layouts.navbar')

@section('conteudo')
    {{-- @if (isset($errors) && count($errors) > 0)
        @foreach ($errors->all() as $error)
            <li><span class="badge text-bg-danger">{{ $error }}</span></li>
        @endforeach
    @endif --}}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label mt-4">Nome da disciplina</label>
            <input class="form-control" name="name" id="name" type="text"autocomplete="off">
            <button type="submit" class="btn btn-success mt-3 btn-sm" id="disciplineCreateBTN">Ciar nova disciplina</button>
        </div>

    <hr>
    <div class="container row">
        <div class="container col-md-2">
            <button class="btn btn-secondary" disabled>Disciplinas</button>
        </div>

        <div id="teste">

        </div>

        {{-- Essa parte foi feita em javascript --}}
        <div id="disciplineShow" class="row">

            </div>

        </div>
    </div>

@endsection
