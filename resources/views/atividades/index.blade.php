@extends('layouts.navbar')


@section('conteudo')
    <div class="container row mt-5">
        <div class="container col-md-2">
            <button class="btn btn-secondary ms-5 " disabled>Atividades</button>
        </div>

        <div class="row">

            
            @foreach ($activities as $item)
                <div class="col-md-3" id="card">
                    <ul>
                        <div class="card mt-5" id="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->discipline->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $item->name }}</h6>
                                <p class="card-text">{{ $item->description }}</p>
                                <a href="{{ route('activities.show', $item->id) }}" class="card-link">Ver atividade</a>
                                @if (Auth::guard('teachers')->user())
                                <br>
                                <div class="position-absolute bottom-0 end-0 me-2 mb-2">
                                    <a class="btn btn-primary btn-sm d-inline-flex align-items-center" href="{{route('activities.check', $item->id)}}">Ver respostas</a>
                                </div>
                            @endif
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
