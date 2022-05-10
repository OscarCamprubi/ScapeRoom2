<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Valoracio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValoracioController extends Controller
{
    public function list()
    {
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return view('valoracio.llistaValoracions')->with('valoracions', Valoracio::all())->with('user', $user);
        }
        return view('valoracio.llistaValoracions')->with('valoracions', Valoracio::all());
    }

    public function create()
    {
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return view('valoracio.createValoracio')->with('user', $user);
        }
        return view('valoracio.createValoracio');
    }

    public function save(Request $request)
    {
        $req = request()->all();
        $validated = $this->validaValoracio($request);


        $valoracio = new Valoracio();
        $valoracio->numValoracio = $req['numValoracio'];
        $valoracio->textValoracio = $req['textValoracio'];
        $valoracio->save();
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return redirect('/list-valoracio/')->with('user', $user);
        }
        return redirect('/list-valoracio/');

    }

    public function edit($idValoracio)
    {
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return view('valoracio.editValoracio')->with('valoracio', Valoracio::find($idValoracio))->with('user', $user);
        }
        return view('valoracio.editValoracio')->with('valoracio', Valoracio::find($idValoracio));
    }

    public function update(Request $req)
    {
        $validated = $this->validaValoracio($req);
        $data = $req->all();
        $valoracio = Valoracio::find($data['id']);
        $valoracio->numValoracio = $req['numValoracio'];
        $valoracio->textValoracio = $req['textValoracio'];
        $valoracio->save();
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return redirect('/list-valoracio')->with('user', $user);
        }
        return redirect('/list-valoracio');

    }

    public function delete($idValoracio)
    {
        $valoracio = Valoracio::find($idValoracio);
        $valoracio->delete();
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return redirect('/list-valoracio')->with('user', $user);
        }
        return redirect('/list-valoracio');
    }

    public function validaValoracio($request)
    {
        return $request->validate([
            'numValoracio' => 'required|numeric|min:1|max:5',
            'textValoracio' => 'required'
        ]);
    }
}
