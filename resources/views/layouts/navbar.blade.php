<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" id="_token">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>


    <div class="container ">
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <h6 class="nav-item dropdown mb-2">

                </h6>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Inicio</a>
                        </li>
                        
                        {{-- parte do professor --}}

                        @if (Auth::guard('students')->user())
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page"
                                href="/">Atividades enviadas</a>
                        </li>
                        @endif
                        @if (Auth::guard('teachers')->user())
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page"
                                    href="{{ route('activities.index') }}">Atividade</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " aria-current="page"
                                    href="{{ route('disciplines.index') }}">Disciplinas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="{{ route('create.student') }}">Registrar
                                    Aluno</a>
                            </li>
                        @endif

                        {{-- fim da parte do professor  --}}

                    </ul>
                    <div class="btn-group">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            data-bs-auto-close="false" aria-expanded="false">
                            {{ $user->name }}
                        </button>

                        <ul class="dropdown-menu">
                            @if (Auth::guard('teachers')->user())
                                <li><a class="dropdown-item" href="{{ route('teacher.info', $user->id) }}">
                                        Detalhes da conta</a></li>
                                {{-- parte do professor --}}
                                <li><a class="dropdown-item" href="#">Atualizar conta</a></li>
                                <li><a class="dropdown-item" href="#">Ver atividades</a></li>
                                {{-- fim da parte do professor  --}}
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('students.info', $user->id) }}">
                                        Detalhes da conta</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>
                        </ul>
                    </div>
                    </ul>



                </div>
            </div>
        </nav>

        @if (\Session::has('msg'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('msg') !!}</li>
                </ul>
            </div>
        @endif
        @if (\Session::has('erro'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('erro') !!}</li>
                </ul>
            </div>
        @endif

        @yield('conteudo')

    </div>


    <script src="{{ asset('/js/jQuery.js') }}"></script>
    <script src="{{ asset('/js/app/app.js') }}"></script>
    <script src="{{ asset('/js/sweetalert2@11.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
