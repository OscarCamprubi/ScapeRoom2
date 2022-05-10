<?php

namespace App\Http\Controllers;

use App\Models\Joc;
use App\Models\Participant;
use App\Models\Sala;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    public function list()
    {
        if (Auth::id() !== null){
            $user = User::find(Auth::id());
            return view('participant.llistaParticipants')->with('participants', Participant::all())->with('user',$user);
        }
        return view('participant.llistaParticipants')->with('participants', Participant::all());
    }

    public function create()
    {
        if (Auth::id() !== null){
            $user = User::find(Auth::id());
            return view('participant.createParticipant')->with('user',$user);
        }
        return view('participant.createParticipant');
    }

    public function save(Request $request)
    {
        $req = request()->all();
        $validated = $this->validaParticipant($request);


        $participant = new Participant();
        $participant->nom = $req['nom'];
        $participant->save();
        if (Auth::id() !== null){
            $user = User::find(Auth::id());
            return redirect('/list-participant/')->with('user',$user);
        }
        return redirect('/list-participant/');

    }

    public function edit($idParticipant)
    {
        if (Auth::id() !== null){
            $user = User::find(Auth::id());
            return view('participant.editParticipant')->with('participant', Participant::find($idParticipant))->with('user',$user);
        }
        return view('participant.editParticipant')->with('participant', Participant::find($idParticipant));
    }

    public function update(Request $req)
    {
        $validated = $this->validaParticipant($req);
        $data = $req->all();
        $sala = Participant::find($data['id']);
        $sala->nom = $data['nom'];
        $sala->save();
        if (Auth::id() !== null){
            $user = User::find(Auth::id());
            return redirect('/list-participant')->with('user',$user);
        }
        return redirect('/list-participant');

    }

    public function delete($idParticipant)
    {
        $participant = Participant::find($idParticipant);
        $participant->delete();
        if (Auth::id() !== null){
            $user = User::find(Auth::id());
            return redirect('/list-participant')->with('user',$user);
        }
        return redirect('/list-participant');
    }

    public function validaParticipant($request)
    {
        return $request->validate([
            'nom' => 'required'
        ]);
    }
}
