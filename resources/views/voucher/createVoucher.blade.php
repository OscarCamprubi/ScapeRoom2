@extends('layouts.app')
@section('title')
    Crea Voucher
@endsection
@section('contingut')
    <form action="/save-voucher" method="POST">
        @csrf
        <div class="mb-3">

            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom')}}">
            @error('nom')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
        </div>
        <input type="submit" class="btn btn-success mt-3" value="Crea">
    </form>
@endsection

