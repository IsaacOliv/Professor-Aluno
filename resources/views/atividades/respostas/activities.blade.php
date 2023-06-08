@extends('layouts.navbar')


@section('conteudo')
    <div class="container row mt-5">
        <div class="container col-md-2">
            <button class="btn btn-secondary" disabled>Atividades</button>
        </div>

        <div class="row">


            @foreach ($visual as $item)
                <div class="col-md-3" id="card">
                    <ul>
                        <div class="card mt-5" id="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->discipline->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $item->name }}</h6>
                                <p class="card-text">{{ $item->description }}</p>
                                <a href="{{ route('activities.show', $item->id) }}" class="card-link">Ver atividade</a>
                                <br>
                                <a class="mt-2" href="{{ route('students.responses', $item->id) }}">Responder
                                    atividade</a>


                            </div>
                    </ul>
                </div>
            @endforeach
        </div>
        <div>
            {{ $visual->links() }}
        </div>
    </div>
@endsection
