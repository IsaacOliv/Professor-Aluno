@extends('layouts.navbar')


@section('conteudo')
    <th>
        <form action="{{ route('disciplines.update', $disciplines->id) }}" method="post">
            <label for="exampleFormControlInput1" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $disciplines->name }}">
            @csrf
            @method('put')
            <button type="submit"  class="btn btn-success mt-1">
                Atualizar disciplina
            </button>
        </form>



    </th>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Açoes</th>
            </tr>
        </thead>
        <div class="row">
            <tbody>
                <tr>
                    <td class="col-md-1">Mark</td>
                    <td class="col-md-1">Otto@email.com.br</td>
                    <td class="col-md-1">1</td>
                    <th class="col-md-1">
                        <a href="#" class="btn btn-primary">Ver</a>
                        <a href="#" class="btn btn-warning">Desvincular</a>
                    </th>
                </tr>
            </tbody>
        </div>
    </table>
@endsection
