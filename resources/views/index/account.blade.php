@extends('layouts.newAccount')

@section('accountNew')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="">
            <div class="modal modal-sheet position-static d-block p-4 py-md-5" tabindex="-1" role="dialog" id="modalTour">
                <div class="modal-dialog" role="document">
                    <div class="modal-content rounded-4 shadow">
                        <div class="modal-body p-5">
                            <h2 class="fw-bold mb-0">Selecionar usuario</h2>
                            <a class="btn btn-lg btn-primary mt-5 w-100" href="{{ route('students.login') }}">Aluno</a>
                            <a class="btn btn-lg btn-primary mt-5 w-100" href="{{ route('login') }}">Professor</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
