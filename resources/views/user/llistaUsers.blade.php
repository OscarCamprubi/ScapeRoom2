@extends('layouts.app')
@section('title')
    Llistat de Usuaris
@endsection
@section('contingut')
    <h1 class="text-center mt-3">Llista de Usuaris</h1>
    <div class="row m-3">
        <?php foreach ($users as $user) { ?>
        <div class="col-9 card m-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$user->email}}</h5>
            </div>
            <div class="card-footer">
                <a href="/show-user/{{$user->id}}" class="btn btn-primary">+ Info</a>
            </div>
        </div>
        <?php } ?>
    </div>
@endsection

