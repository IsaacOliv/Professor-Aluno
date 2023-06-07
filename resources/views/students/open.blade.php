@extends('layouts.navbar')


@section('conteudo')
    <div class="container row mt-5">
        <div class="container col-md-2">
            <button class="btn btn-secondary" disabled>Atividades</button>
        </div>

        <div class="row">


            @foreach ($final as $item)
                <div class="col-md-3" id="card">
                    <ul>
                        <div class="card mt-5" id="card" style="width: 18rem;">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $item->name }}</h6>
                                <p class="card-text">{{ $item->description }}</p>
                                <p class="card-title">Ultimo envio: {{date( 'd/m', strtotime($item->updated_at))}}</p>
                                <p class="card-title">{{date( "H:i:s" , strtotime($item->updated_at))}}</p>
                                <a href="{{ route('students.edit', $item->id) }}" class="card-link">Ver resposta</a>
                                <br>
                            </div>
                    </ul>
                </div>
            @endforeach
        </div>
        <div>
            {{ $final->links() }}
        </div>
    </div>
@endsection
