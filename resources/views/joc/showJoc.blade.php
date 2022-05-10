@extends('layouts.app')
@section('title')
    @empty($joc)
        Not found
    @endempty
    @isset($joc)
        {{$joc->nom}}
    @endisset
@endsection
@section('contingut')
    @empty($joc)
        <h1 class="text-center">Not found</h1>
    @endempty
    @isset($joc)
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="card-title m-3">{{$joc->nom}}</h5>
            </div>
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted m-3 mb-4">{{$joc->descripcio}}</h6>
                <ul class="list-group">
                    <li class="list-group-item">
                        <p class="card-text">Mínim de Jugadors: {{$joc->minJugadors}}</p>
                        <p class="card-text">Màxim de Jugadors: {{$joc->maxJugadors}}</p>
                    </li>
                </ul>
            </div>
            <div class="card-footer p-4">
                <a class="btn btn-primary me-3" href="/edit-joc/{{$joc->id}}">Edita</a>
                <a class="btn btn-danger" href="/delete-joc/{{$joc->id}}">Elimina</a>
            </div>
        </div>
    @endisset
@endsection
