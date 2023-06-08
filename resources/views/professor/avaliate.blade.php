@extends('layouts.navbar')


@section('conteudo')
    {{-- enctype="multipart/form-data" --}}
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('teacher.avaliate.activitie', $activities->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3 mt-3">
            <input type="hidden" class="form-control" name="activity_id" value="{{ $activities->activity_id }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Aluno</label>
            <label for="exampleInputPassword1" class="form-control">{{ $activities->student->name }}</label>
            <input type="hidden" class="form-control" name="student_id" value="{{ $user->id }}">
        </div>
        <div class="mb-3">

            <input class="form-check-input" type="checkbox" value="1" name="check" id="flexCheckDefault" > Visto de atividade
        </div>

    
    <div class="form-floating">
            <select class="" id="floatingSelect" name="note" aria-label="Floating label select example ms-5">
                <option selected disabled>Nota</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
        @if ($activities->filepath)
            <a class="btn btn-lg btn-primary mb-3 mt-2" href="{{ url("storage/{$activities->filepath}") }}" target="_blank">
                Baixar
                Arquivo</a>
        @endif

        <textarea class="mt-2" name="description" id="trumbowyg-demo" disabled cols="30" rows="10">{{ $activities->description }}</textarea>
        <input type="hidden" name="description" value="{{$activities->description}}">
        <button class="btn btn-primary mt-2">Submit</button>
    </form>
@endsection
