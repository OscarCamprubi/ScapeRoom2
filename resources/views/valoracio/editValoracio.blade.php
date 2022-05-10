@extends('layouts.app')
@section('title')
    Crea Valoracio
@endsection
@section('contingut')
    <form action="/update-valoracio" method="POST">
        @csrf
        <input type="hidden" value="{{$valoracio->id}}" name="id">
        <div class="mb-3">
            <label for="numValoracio" class="form-label">NumValoracio</label>
            <input type="text" class="form-control" id="numValoracio" name="numValoracio"
                   value="{{old('numValoracio',$valoracio->numValoracio)}}">
            @error('numValoracio')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
        </div>
        <div class="mb-3">

            <label for="textValoracio" class="form-label">TextValoracio</label>
            <input type="text" class="form-control" id="textValoracio" name="textValoracio"
                   value="{{old('textValoracio',$valoracio->textValoracio)}}">
            @error('textValoracio')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
        </div>
        <input type="submit" class="btn btn-success mt-3" value="Crea">
    </form>
@endsection


