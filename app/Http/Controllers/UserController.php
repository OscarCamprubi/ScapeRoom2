<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return $users;
    }
    public function list()
    {
        $users = User::all();
        if (Auth::id() !== null){
            $user = User::find(Auth::id());
            return view('user.llistaUsers')->with('users', User::all())->with('user',$user);
        }
        return view('user.llistaUsers')->with('users',json_encode($users));
    }

    public function show($idUser)
    {
        if (Auth::id() !== null){
            $user = User::find(Auth::id());
            return view('user.showUser')->with('userShow', User::find($idUser))->with('user',$user);
        }
        return view('user.showUser')->with('userShow', User::find($idUser));
    }

    public function create()
    {
        return view('login.register');
    }

    public function save(Request $request)
    {
        $req = request()->all();
        $validated = $this->validaUser($request);


        $userShow = new User();
        $userShow->name = $req['nom'];
        $userShow->email = $req['email'];
        $userShow->password = bcrypt($req['password']);
        $userShow->bornDate = $req['bornDate'];
        $userShow->role = 2;
        $userShow->save();
        if (Auth::id() !== null){
            $user = User::find(Auth::id());
            return redirect('/show-user/' . $userShow->id)->with('user',$user);
        }
        return redirect('/show-user/' . $userShow->id);
    }

    public function edit($idUser)
    {
        if (Auth::id() !== null){
            $user = User::find(Auth::id());
            return view('user.editUser')->with('userEdit', User::find($idUser))->with('user',$user);
        }
        return view('user.editUser')->with('userEdit', User::find($idUser));
    }

    public function update(Request $request)
    {
        $req = request()->all();
        $validated = $this->validaUser($request);


        $user = User::find($req['id']);
        $user->name = $req['nom'];
        $user->email = $req['email'];
        $user->password = bcrypt($req['password']);
        $user->save();
        if (Auth::id() !== null){
            $user = User::find(Auth::id());
            return redirect('/show-user/' . $req['id'])->with('user',$user);
        }
        return redirect('/show-user/' . $user->id);

    }

    public function delete($idUser)
    {

        $user = User::find($idUser);
        $user->delete();
        if (Auth::id() !== null){
            $user = User::find(Auth::id());
            return redirect('/list-user')->with('user',$user);
        }
        return redirect('/list-user');
    }

    public function validaUser($request)
    {
        return $request->validate([
            'nom' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:5|max:20',
            'bornDate' => 'required|date'
        ]);
    }
}
