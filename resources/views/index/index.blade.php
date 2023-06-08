@extends('layouts.navbar')


@section('conteudo')
    <div class="row">
        @foreach ($disciplines as $discipline)
            <div class="col-md-3" id="card">
                <ul>
                    @if (Auth::guard('students')->user())
                        <div class="card mt-5" style="width: 18rem;">
                            <div class="card-body text-center" id="card">
                                <h5 class="card-title">{{ $discipline->name }}</h5>

                                <p class="card-text mt-3">Atividades: </p>
                                <p><a href="{{ route('students.activities', $discipline->id) }}">Ver atividades</a></p>
                                <a class="mt-2" href="{{ route('students.edit.where', $discipline->id) }}">Atividades
                                    respondidas</a>
                            </div>
                        </div>
                    @endif

                </ul>
            </div>
        @endforeach
    </div>
@endsection
