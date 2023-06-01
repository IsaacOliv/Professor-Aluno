@extends('layouts.navbar')


@section('conteudo')
    <div class="container row mt-5">
        <div class="container col-md-2">
            <button class="btn btn-secondary" disabled>Atividades</button>
        </div>

        <div class="row">
            @foreach ($activities as $activitie)
                <div class="col-md-3" id="card">
                    <ul>
                        <div class="card mt-5" id="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $activitie->discipline->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $activitie->name }}</h6>
                                <p class="card-text">{{ $activitie->description }}</p>
                                <a href="{{ route('activities.show', $activitie->id) }}" class="card-link">Ver atividade</a>
                                <br>
                                <a class="mt-2" href="{{ route('students.responses', $activitie->id) }}">Responder
                                    atividade</a>
                            </div>
                    </ul>
                </div>
            @endforeach
        </div>
        <div>
            {{ $activities->links() }}
        </div>
    </div>
@endsection
