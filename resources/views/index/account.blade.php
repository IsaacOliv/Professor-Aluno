@extends('layouts.newAccount')

@section('accountNew')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div >
            <div class="card-body text-center">

                <h3 class="mb-5">Usuario</h3>

                <div class="mb-4">
                    <a class="btn btn-primary btn-lg" href="{{ route('students.login') }}">Aluno</a>
                </div>

                <div>
                    <a class="btn btn-primary btn-lg" href="{{ route('login') }}">Professor</a>
                </div>

            </div>
        </div>
    </div>
@endsection
