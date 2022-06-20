@extends('layouts.app')
@section('title')
    Crea Joc
@endsection
@section('contingut')
    @isset($maxCapacity)
        <h1 class="text-center">Aquest Joc ja no accepta més participants</h1>
    @else
        <form action="/save-participant" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom')}}">
                @error('nom')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror
            </div>
            <input type="hidden" value="{{$reserva}}" name="reserva">
            <input type="submit" class="btn btn-success mt-3" value="Crea">
        </form>
    @endisset
@endsection
