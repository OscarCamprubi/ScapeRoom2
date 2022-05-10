@extends('layouts.app')
@section('title')
    Llista de Valoracions
@endsection
@section('contingut')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">numValoracio</th>
            <th scope="col">textValoracio</th>
            <th scope="col">Accions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($valoracions as $valoracio){
        ?>
        <tr>
            <td>{{$valoracio->numValoracio}}</td>
            <td>{{$valoracio->textValoracio}}</td>
            <td>
                <a href="/edit-valoracio/{{$valoracio->id}}" class="btn btn-primary">Edita</a>
                <a href="/delete-valoracio/{{$valoracio->id}}" class="btn btn-danger">Elimina</a>
            </td>
        </tr>
        <?php
        } ?>
        </tbody>
    </table>
@endsection

