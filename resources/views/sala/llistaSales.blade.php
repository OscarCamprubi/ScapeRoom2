@extends('layouts.app')
@section('title')
    Llista de Sales
@endsection
@section('contingut')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Sala</th>
            <th scope="col">Joc</th>
            <th scope="col">Aforament</th>
            <th scope="col">Accions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $contSales = 1;
        foreach ($sales as $sala){
        ?>
        <tr>
            <td>{{$contSales}}</td>
            <td>{{$sala->idJoc}}</td>
            <td>{{$sala->aforament}}</td>
            <td>
                <a href="/edit-sala/{{$sala->id}}" class="btn btn-primary">Edita</a>
                <a href="/delete-sala/{{$sala->id}}" class="btn btn-danger">Elimina</a>
            </td>
        </tr>
        <?php
        $contSales = $contSales + 1;
        } ?>
        </tbody>
    </table>
@endsection
