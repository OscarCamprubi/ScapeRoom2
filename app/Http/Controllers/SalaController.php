<?php

namespace App\Http\Controllers;

use App\Models\Joc;
use App\Models\Sala;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Integer;

class SalaController extends Controller
{
    public function index()
    {
        $sales = Sala::all();
        return $sales;
    }

    public function list()
    {
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return view('sala.llistaSales')->with('sales', Sala::all())->with('user', $user);
        }
        return view('sala.llistaSales')->with('sales', Sala::all());
    }

    public function create()
    {
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return view('sala.createSala')->with('jocs', Joc::all())->with('user', $user);
        }
        return view('sala.createSala')->with('jocs', Joc::all());
    }

    public function save(Request $request)
    {
        $req = request()->all();
        $validated = $this->validaSala($request);


        $sala = new Sala();
        $sala->idJoc = $req['idJoc'];
        $sala->aforament = $req['aforament'];
        var_dump($sala->idJoc);
        $sala->save();

        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return redirect('/list-sala/')->with('user', $user);
        }
        return redirect('/list-sala/');

    }

    public function edit($idSala)
    {
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return view('sala.editSala')->with(['sala' => Sala::find($idSala), 'jocs' => Joc::all()])->with('user', $user);
        }
        return view('sala.editSala')->with(['sala' => Sala::find($idSala), 'jocs' => Joc::all()]);
    }

    public function update(Request $req)
    {
        $validated = $this->validaSala($req);
        $data = $req->all();
        $sala = Sala::find($data['id']);
        $sala->aforament = $data['aforament'];
        $sala->joc_id = $data['idJoc'];
        $sala->save();
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return redirect('/list-sala')->with('user', $user);
        }
        return redirect('/list-sala');

    }

    public function delete($idSala)
    {
        $sala = Sala::find($idSala);
        $sala->delete();
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return redirect('/list-sala')->with('user', $user);
        }
        return redirect('/list-sala');
    }

    public function validaSala($request)
    {
        return $request->validate([
            'idJoc' => 'required',
            'aforament' => 'required|numeric|min:1'
        ]);
    }
}
