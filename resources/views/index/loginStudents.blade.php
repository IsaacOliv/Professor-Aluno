@extends('layouts.newAccount')

@section('accountNew')
<form class="container py-5 h-100" action="{{ route('students.authenticate') }}" method="post">
    @csrf
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <h3 class="mb-5">Login aluno</h3>

                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg"
                            placeholder="Email" />
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg"
                            placeholder="Password" />
                    </div>
                    <button class="btn btn-primary btn-lg btn-block mb-3" type="submit">Login</button>
                    <div class="container">
                        <a href="{{ route('account') }}" class="voltar">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
