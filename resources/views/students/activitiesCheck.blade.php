@extends('layouts.navbar')

@section('conteudo')
    <div class="row mt-5">




        @foreach ($activities as $item)
            @if ($item->activity->discipline->id == $discipline)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->activity->discipline->name}}</h5>
                            <p class="card-title">Titulo: {{ $item->activity->name}}</p>
                            <p class="card-title">Data correção: {{date( 'd/m', strtotime($item->updated_at))}}</p>
                            <p class="card-title">Hora da correção: {{date( "H:i:s" , strtotime($item->updated_at))}}</p>
                            <a href="{{route('students.activities.show', $item->id)}}" class="btn btn-primary mt-3">Ver atividade</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach



        
    </div>
@endsection
