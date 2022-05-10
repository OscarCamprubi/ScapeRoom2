@extends('layouts.app')
@section('title')
    @empty($user)
        Not found
    @endempty
    @isset($userShow)
        {{$userShow->name}}
    @endisset
@endsection
@section('contingut')
    @empty($userShow)
        <h1 class="text-center">Not found</h1>
    @endempty
    @isset($userShow)
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="card-title m-3">{{$userShow->name}}</h5>
            </div>
            <div class="card-body">
                <h6 class="card-text">Email: {{$userShow->email}}</h6>
                <p class="card-text">Data de Naixement: {{$userShow->bornDate}}</p>
            </div>
            <div class="card-footer p-4">
                <a class="btn btn-primary me-3" href="/edit-user/{{$userShow->id}}">Edita</a>
                <a class="btn btn-danger" href="/delete-user/{{$userShow->id}}">Elimina</a>
            </div>
        </div>
    @endisset
@endsection
