@extends('layouts.app')
@section('cssLink')
    {{URL::asset('css/login.css')}}
@endsection
@section('title')
    Login
@endsection
@section('contingut')

    <div class="d-flex align-items-center justify-content-center cont">
        <div class="card border-5 rounded-4 vertical-center" style="width: 500px">
            <div class="card-body">
                <form action="/checkLogin" method="POST">
                    @csrf
                    <h3 class="d-flex justify-content-center">LOGIN</h3>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@example.com" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        El email o la contrasenya no són correctes
                    </div>
                    @endif
                    <input class="d-flex justify-content-center btn btn-primary" type="submit" value="Login"
                           style="width: 100%">
                </form>
            </div>
        </div>
    </div>
@endsection
