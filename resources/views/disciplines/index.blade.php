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
            <button type="submit" class="btn btn-success mt-3" id="disciplineCreateBTN">Ciar nova disciplina</button>
        </div>

    <hr>
    <div class="container row">
        <div class="container col-md-2">
            <button class="btn btn-secondary" disabled>Disciplinas</button>
        </div>

        <div id="teste">

        </div>

        {{-- <div > --}}
            {{-- @foreach ($disciplines as $discipline) --}}

        <div id="disciplineShow" class="row">
                {{-- <div class="col-md-3" id="card">
                    <ul id="bodyDisciplines">
                        <div class="card mt-5" style="width: 18rem;">
                            <div class="card-body text-center" id="card">
                                <h5 class="card-title">{{ $discipline->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Quantidade de alunos</h6>
                                <p class="card-text">Nº atividades</p>
                                <p>
                                    <a href="{{ route('activities.create', $discipline->id) }}">Criar atividades</a><br>
                                    <a href="{{ route('disciplines.edit', $discipline->id) }}" class="card-link">Gerenciar
                                        disciplina</a>
                                </p>
                                <p><a href="#">Ver atividades</a></p>
                            </div>
                        </div>
                    </ul>
                </div> --}}
            </div>

            {{-- @endforeach --}}
            {{-- <div>
                {{ $disciplines->links() }}
            </div> --}}
        </div>
    </div>

@endsection
