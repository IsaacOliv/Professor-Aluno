@extends('layouts.accountLoginRegister')

@section('account')
    <div class="limiter">
        <div class="container-login100" style="background-image: url('{{ asset('images/bg-01.jpg') }}');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    Account Register
                </span>

                <form class="login100-form validate-form p-b-33 p-t-5" action="{{ route('create') }}" method="post">
                    @csrf
                    <div class="wrap-input100 validate-input" data-validate="Enter name">
                        <input class="input100" type="text" name="name" placeholder="name">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>
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
                            Register
                        </button>
                    </div>

                </form>
                <div class="container-login100-form-btn m-t-32">
                    <a href="{{route('login')}}" class="voltar" >Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
