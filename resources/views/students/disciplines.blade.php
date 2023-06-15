@extends('layouts.navbar')


@section('conteudo')
    <div class="album py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($disciplines as $discipline)
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('images/qual-a-influencia-da-infraestrutura.jpg') }}">
                            <div class="card-body">
                                <h5>{{ $discipline->name }}</h5>
                                <p class="card-text">O aprendiz é um mestre em formação</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-outline-secondary"
                                            href="{{ route('students.activities', $discipline->id) }}">Ver
                                            atividades</a>
                                        <a class="btn btn-sm btn-outline-secondary"
                                            href="{{ route('students.edit.where', $discipline->id) }}">Respostas</a>
                                        <a class="btn btn-sm btn-outline-secondary"
                                            href="{{ route('students.activities.check', $discipline->id) }}">Correções</a>
                                    </div>
                                    {{-- <small class="text-body-secondary">9 mins</small> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container mt-3">
            {{ $disciplines->links() }}
        </div>
    @endsection
