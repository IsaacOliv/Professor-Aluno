@extends('layouts.accountLoginRegister')

@section('account')
    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{ asset('images/bg-01.jpg') }}');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    Usuario
                </span>


                <a class="login100-form-btn " href="{{route('students.login')}}">Aluno</a>
                    <a class="login100-form-btn mt-5" href="{{route('login')}}">Professor</a>
                    </div>


                
            </div>
        </div>
    </div>
@endsection
