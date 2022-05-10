@extends('layouts.app')
@section('title')
    Llistat de tasques
@endsection
@section('contingut')
    <h1 class="text-center mt-3">Llista de Jocs</h1>
    <a class="btn btn-success" href="/create-joc">Crea</a>
    <div class="row m-3">
        @foreach($jocs as $joc)
        <div class="col-9 card m-5" style="width: 18rem;">
            <img src="{{$joc->img}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$joc->nom}}</h5>
                <p class="card-text">{{$joc->descripcio}}</p>
            </div>
            <div class="card-footer">
                <a href="/show-joc/{{$joc->id}}" class="btn btn-primary">+ Info</a>
            </div>
        </div>
        @endforeach
    </div>
@endsection
