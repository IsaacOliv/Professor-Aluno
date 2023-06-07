@extends('layouts.navbar')

@section('conteudo')
    <div class="container mt-2">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <th scope="row">{{ $item->name }}</th>
                        <th scope="row">{{ $item->email }}</th>

                        @if ($item->status === 1)
                            <th>
                                <span class="badge rounded-pill text-bg-success">Ativado</span>
                            </th>
                        @else
                            <th>
                                <span class="badge rounded-pill text-bg-danger">Desativado</span>
                            </th>
                        @endif

                        <th scope="row"><a href="{{route('teacher.edit.student', $item->id)}}">Editar</a></th>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="container">
        {{ $students->links() }}
    </div>
@endsection
