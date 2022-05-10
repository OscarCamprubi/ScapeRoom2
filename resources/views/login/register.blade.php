@extends('layouts.app')
@section('cssLink')
    {{URL::asset('css/login.css')}}
@endsection
@section('title')
    Register
@endsection
@section('contingut')
    <div class="d-flex align-items-center justify-content-center cont">
        <div class="card border-5 rounded-4 vertical-center" style="width: 500px">
            <div class="card-body">
                <form action="/save-user" method="POST">
                    @csrf
                    <h3 class="d-flex justify-content-center">REGISTER</h3>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{old('nom')}}">
                        @error('nom')
                        <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
                        @error('email')
                        <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                               value="{{old('password')}}">
                        @error('password')
                        <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="bornDate" class="form-label">Data de Naixement</label>
                        <input type="date" name="bornDate" id="bornDate" class="form-control"
                               value="{{old('bornDate')}}">
                        @error('bornDate')
                        <h6 class="alert alert-danger">{{$message}}</h6>
                        @enderror
                    </div>

                    <input type="submit" class="d-flex justify-content-center btn btn-success" value="Crea" style="width: 100%">
                </form>
            </div>
        </div>
    </div>

@endsection


