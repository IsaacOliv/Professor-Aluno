@extends('layouts.newAccount')

@section('accountNew')
<form class="container py-5 h-100" action="{{ route('logar') }}" method="post">
    @csrf
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">

                    <h3 class="mb-5">Login professor</h3>

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
    {{-- <div class="limiter">
        <div class="container-login100" style="background-image: url('{{ asset('images/bg-01.jpg') }}');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    Professor login
                </span>

                <form class="login100-form validate-form p-b-33 p-t-5" action="{{ route('logar') }}" method="post">
                    @csrf
                    <div class="wrap-input100 validate-input" data-validate="Enter email">
                        <input class="input100" type="text" name="email" placeholder="email">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>
                    </div>

                </form>
                <div class="container-login100-form-btn m-t-32">
                    <a href="{{route('account')}}" class="voltar" >Voltar</a>
                </div>
            </div>
        </div>
    </div> --}}
@endsection







