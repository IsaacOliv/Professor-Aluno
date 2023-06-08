@extends('layouts.navbar')


@section('conteudo')
    <div class="container row mt-5">
        <div class="container col-md-2">
            <button class="btn btn-secondary ms-5" disabled>Atividades</button>
        </div>

        <div class="row">
            @foreach ($activities as $activitie)
                <div class="col-md-3" id="card">
                    <ul>
                        <div class="card mt-5" style="width: 18rem;">
                            <div class="card-body" id="cardDelete">
                                <h5 class="card-title">{{ $activitie->discipline->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $activitie->name }}</h6>
                                <p class="card-text">{{ $activitie->description }}</p>
                                <a href="{{ route('activities.show', $activitie->id) }}" class="card-link">Ver atividade</a>
                            </div>

                            <button type="submit"class="btn btn-danger mt-2"
                                onclick="deleteActivitie({{ $activitie->id }})">
                                Excluir Disciplina
                            </button>

                    </ul>
                </div>
            @endforeach
        </div>
        <div>
            {{ $activities->links() }}
        </div>
    </div>
@endsection
