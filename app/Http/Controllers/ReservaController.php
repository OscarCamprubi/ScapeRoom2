<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    public function list()
    {
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return view('reserva.llistaReserves')->with('reserves', Reserva::all())->with('user', $user);
        }
        return view('reserva.llistaReserves')->with('jocs', Reserva::all());
    }

    public function show($idReserva)
    {
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return view('reserva.showReserva')->with('reserva', Reserva::find($idReserva))->with('user', $user);
        }
        return view('reserva.showReserva')->with('reserva', Reserva::find($idReserva));
    }

    public function create()
    {

        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            if ($user->role == 1){
                $empleats = DB::table('users')->select('*')->where('role', '=', 1)->get();
                return view('reserva.createReserva')->with('empleats', $empleats)->with('vouchers', Voucher::all())->with('user', $user);
            }

            return view('reserva.createReserva')->with('vouchers', Voucher::all())->with('user', $user);
        }
        return redirect('/login');
    }

    public function save(Request $request)
    {
        $req = request()->all();
        $validated = $this->validaReserva($request);


        $res = new Reserva();
        $res->idUser = Auth::id();
        $res->idSala = $req['idSala'];
        if (isset($req['idEmpleat'])){
            $res->idEmpleat = $req['idEmpleat'];
        }
        $res->idVoucher = $req['idVoucher'];
        $res->save();
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return redirect('/show-reserva/' . $res->id)->with('user', $user);
        }
        return redirect('/show-reserva/' . $res->id);

    }

    public function edit($idReserva)
    {
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return view('reserva.editReserva')->with('reserva', Reserva::find($idReserva))->with('user', $user);
        }
        return view('reserva.editReserva')->with('reserva', Reserva::find($idReserva));
    }

    public function update(Request $request)
    {
        $req = request()->all();
        $validated = $this->validaReserva($request);


        $res = Reserva::find($req['id']);
        $res->id_sala = $req['idSala'];
        if (isset($req['idEmpleat'])){
            $res->idEmpleat = $req['idEmpleat'];
        }
        $res->id_voucher = $req['idVoucher'];
        $res->save();
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return redirect('/show-reserva/' . $res->id)->with('user', $user);
        }
        return redirect('/show-reserva/' . $res->id);

    }

    public function delete($idReserva)
    {
        $reserva = Reserva::find($idReserva);
        $reserva->delete();
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return redirect('/list-reserva/')->with('user', $user);
        }
        return redirect('/list-reserva');
    }

    public function validaReserva($request)
    {
        return $request->validate([
            'idSala' => 'required',
            'idVoucher' => 'required',
        ]);
    }
}
