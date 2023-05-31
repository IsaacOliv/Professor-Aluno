@extends('layouts.navbar')

@section('conteudo')



<form action="{{route('store.student')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nome</label>
        <input type="text" class="form-control" name="name">
      </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email</label>
      <input type="email" class="form-control" name="email">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">senha</label>
      <input type="password" class="form-control" name="password">
    </div>

    <select class="form-select" name="status">
        <option selected disabled>Status</option>
        <option value="1">Ativado</option>
        <option value="0">Desativado</option>
    </select>

    <button type="submit" class="btn btn-primary mt-2">Submit</button>
  </form>
@endsection
