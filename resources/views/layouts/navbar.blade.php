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
    <link rel="stylesheet" href="{{ asset('/vendor/Trumbowyg/dist/ui/trumbowyg.min.css') }}">

</head>

<body>
    <div class="container ">
        <header class="p-3 mb-3 border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                   

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <a class="nav-link px-2 link-secondary" aria-current="page"
                            href="{{ route('index') }}">Inicio</a>
                        @if (Auth::guard('students')->user())
                            <li><a href="{{ route('students.activities.open') }}"
                                    class="nav-link px-2 link-body-emphasis">Atividades enviadas</a></li>
                            <li><a href="{{ route('disciplines.index.student') }}"
                                    class="nav-link px-2 link-body-emphasis">Disciplinas</a></li>
                        @endif

                        @if (Auth::guard('teachers')->user())
                            <li><a href="{{ route('activities.index') }}"
                                    class="nav-link px-2 link-body-emphasis">Atividade</a></li>
                            <li><a href="{{ route('disciplines.index') }}"
                                    class="nav-link px-2 link-body-emphasis">Disciplinas</a></li>
                            <li><a href="{{ route('create.student') }}"
                                    class="nav-link px-2 link-body-emphasis">Registrar aluno</a></li>
                            <li><a href="{{ route('teacher.show.student') }}"
                                    class="nav-link px-2 link-body-emphasis">Alunos registrados</a></li>
                        @endif


                    </ul>

                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('images/icons/png-transparent-profile-logo-computer-icons-user-user-blue-heroes-logo-thumbnail.png') }}"
                                alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>

                        <ul class="dropdown-menu text-small" style="">
                            @if (Auth::guard('teachers')->user())
                                <li><a class="dropdown-item" href="{{ route('teacher.info', $user->id) }}">
                                        Detalhes da conta</a></li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('students.info', $user->id) }}">
                                        Detalhes da conta</a></li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>

                        </ul>


                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="container ">



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



    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-body-secondary">© 2023 Company, Inc</p>

            <a href="/"
                class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
            </ul>
        </footer>
    </div>

    <script src="{{ asset('/js/jQuery.js') }}"></script>
    <script src="{{ asset('/js/app/app.js') }}"></script>
    <script src="{{ asset('/js/sweetalert2@11.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('/vendor/Trumbowyg/dist/trumbowyg.min.js') }}"></script>
    <script src="{{ asset('/js/app/editor.js') }}"></script>



</body>

</html>
