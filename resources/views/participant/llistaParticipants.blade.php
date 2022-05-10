@extends('layouts.app')
@section('title')
    Llista de Participants
@endsection
@section('contingut')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Participant</th>
            <th scope="col">Nom</th>
            <th scope="col">Accions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $contParticipants = 1;
        foreach ($participants as $participant){
        ?>
        <tr>
            <td>{{$contParticipants}}</td>
            <td>{{$participant->nom}}</td>
            <td>
                <a href="/edit-participant/{{$participant->id}}" class="btn btn-primary">Edita</a>
                <a href="/delete-participant/{{$participant->id}}" class="btn btn-danger">Elimina</a>
            </td>
        </tr>
        <?php
        $contParticipants = $contParticipants + 1;
        } ?>
        </tbody>
    </table>
@endsection
