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
                                <p class="mt-3"><a  href="{{ route('students.activities', $discipline->id) }}">Ver atividades</a></p>
                                <div class="col 2">
                                    <div class="row mt-2">
                                        <div class="col">
                                            <a class="mt-2 btn btn-primary btn-sm"
                                                href="{{ route('students.edit.where', $discipline->id) }}">Atividades
                                                respondidas</a>
                                        </div>
                                        <div class="col">
                                            <a class="mt-2 btn btn-success btn-sm"
                                                href="{{ route('students.activities.check', $discipline->id) }}">Atividades
                                                corrigidas</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </ul>
            </div>
        @endforeach
    </div>
@endsection
