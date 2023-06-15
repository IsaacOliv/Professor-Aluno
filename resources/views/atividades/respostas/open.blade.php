@extends('layouts.navbar')


@section('conteudo')
    <div class="album py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($final as $item)
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/capa-blog-diferenciar-escola-min.png') }}">
                            <div class="card-body">
                                <h5 class="card-subtitle mb-2 ">
                                    {{ $item->activity->discipline->name }}</h5>
                                <p class="card-text">Titulo: {{ $item->activity->name }}</p>
                                <p class="card-text">O aprendiz é um mestre em formação</p>
                                <div class="d-flex justify-content-between align-items-center">

                                    <div class="btn-group">
                                        <a href="{{ route('students.edit', $item->id) }}"
                                            class="btn btn-sm btn-outline-secondary">Ver resposta</a>

                                    </div>
                                    <small class="text-body-secondary">
                                        {{ date('H:i', strtotime($item->updated_at)) }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container mt-3">
            {{ $final->links() }}
        </div>
    @endsection
