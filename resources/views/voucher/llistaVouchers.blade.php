@extends('layouts.app')
@section('title')
    Llista de Participants
@endsection
@section('contingut')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Accions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($vouchers as $voucher){
        ?>
        <tr>
            <td>{{$voucher->nom}}</td>
            <td>
                <a href="/edit-voucher/{{$voucher->id}}" class="btn btn-primary">Edita</a>
                <a href="/delete-voucher/{{$voucher->id}}" class="btn btn-danger">Elimina</a>
            </td>
        </tr>
        <?php
        } ?>
        </tbody>
    </table>
@endsection
