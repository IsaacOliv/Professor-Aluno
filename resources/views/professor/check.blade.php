@extends('layouts.navbar')


@section('conteudo')
    <div class="container row mt-5">
        <div class="container col-md-2">
            <button class="btn btn-secondary ms-5" disabled>Atividades</button>
        </div>

        <div class="row">
            @foreach ($activities as $item)
                <div class="col-md-3" id="card">
                    <ul>
                        <div class="card mt-5" id="card" style="width: 18rem;">
                            <div class="card-body">
                                <p>{{$item->activity->discipline->name}}</p>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Aluno: {{ $item->student->name }}</h6>
                                <p class="card-title">Ultimo envio: {{ date('d/m', strtotime($item->updated_at)) }}</p>
                                <a href="{{ route('teacher.avaliate', $item->id) }}" class="card-link">Ver resposta</a>
                                <br>
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
