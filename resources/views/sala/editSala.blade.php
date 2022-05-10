@extends('layouts.app')
@section('title')
    Edita Sala
@endsection
@section('contingut')
    <form action="/update-sala" method="POST">
        @csrf
        <input type="hidden" value="{{$sala->id}}" name="id">
        <div class="mb-3">
            <label for="idJoc" class="form-label">Joc</label>
            <select class="form-select" id="idJoc" name="idJoc">
                <option value="0" selected disabled>Selecciona un Joc</option>
                @foreach($jocs as $joc)
                    <option
                        value="{{ $joc->id }}" {{ (old('idJoc',$sala->joc_id)  == $joc->id? "selected":"") }}>{{$joc->nom . ',' .$joc->descripcio . ',' . $joc->minJugadors . ',' . $joc->maxJugadors}}</option>
                @endforeach
            </select>
            @error('idJoc')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="aforament">Aforament</label>
            <input class="form-control" type="number" id="aforament" name="aforament"
                   value="{{old("aforament",$sala->aforament)}}">
            @error('aforament')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
        </div>


        <input type="submit" class="btn btn-success mt-3" value="Edita">
    </form>
@endsection
