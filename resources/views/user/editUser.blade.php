@extends('layouts.app')
@section('title')
    Edita Usuari
@endsection
@section('contingut')
    <form action="/update-user" method="POST">
        @csrf
        <input type="hidden" value="{{$userEdit->id}}" name="id">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom',$userEdit->name)}}">
            @error('nom')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{old('email',$userEdit->email)}}">
            @error('email')
            <h6 class="alert alert-danger">{{$message}}</h6>
            @enderror
        </div>
        @if(isset($user))
            @if($user->role === 1)
                <div class="row">
                    <div class="mb-3 col">
                        <label for="role" class="form-label">Data de Naixement</label>
                        <input type="date" name="role" id="role" class="form-control"
                               value="{{old('bornDate',$userEdit->bornDate)}}">
                        @error('bornDate')
                        <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <label for="bornDate" class="form-label">Rol</label>
                        <select class="form-select" aria-label="Default select example"
                                name="role">
                            <option {{ $userEdit->role === 1 ? 'selected' : '' }} value="1">Admin</option>
                            <option {{ $userEdit->role === 2 ? 'selected' : '' }} value="2">Current User</option>
                            <option {{ $userEdit->role === 3 ? 'selected' : '' }} value="3">Empleat</option>
                        </select>
                    </div>
                </div>
            @endif
        @else
            <div class="mb-3 col">
                <label for="role" class="form-label">Data de Naixement</label>
                <input type="date" name="role" id="role" class="form-control"
                       value="{{old('bornDate',$userEdit->bornDate)}}">
                @error('bornDate')
                <h6 class="alert alert-danger">{{$message}}</h6>
                @enderror
            </div>
        @endif

        <input type="submit" class="btn btn-success mt-3" value="Edita">
    </form>
@endsection

