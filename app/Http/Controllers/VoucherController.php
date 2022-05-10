<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    public function list()
    {
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return view('voucher.llistaVouchers')->with('vouchers', Voucher::all())->with('user', $user);
        }
        return view('voucher.llistaVouchers')->with('vouchers', Voucher::all());
    }

    public function create()
    {
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return view('voucher.createVoucher')->with('user', $user);
        }
        return view('voucher.createVoucher');
    }

    public function save(Request $request)
    {
        $req = request()->all();
        $validated = $this->validaVoucher($request);


        $voucher = new Voucher();
        $voucher->nom = $req['nom'];
        $voucher->save();
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return redirect('/list-voucher/')->with('user', $user);
        }
        return redirect('/list-voucher/');

    }

    public function edit($idVoucher)
    {
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return view('voucher.editVoucher')->with('voucher', Voucher::find($idVoucher)->with('user', $user));
        }
        return view('voucher.editVoucher')->with('voucher', Voucher::find($idVoucher));
    }

    public function update(Request $req)
    {
        $validated = $this->validaVoucher($req);
        $data = $req->all();
        $voucher = Voucher::find($data['id']);
        $voucher->nom = $data['nom'];
        $voucher->save();
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return redirect('/list-voucher')->with('user', $user);
        }
        return redirect('/list-voucher');

    }

    public function delete($idVoucher)
    {
        $voucher = Voucher::find($idVoucher);
        $voucher->delete();
        if (Auth::id() !== null) {
            $user = User::find(Auth::id());
            return redirect('/list-voucher')->with('user', $user);
        }
        return redirect('/list-voucher');
    }

    public function validaVoucher($request)
    {
        return $request->validate([
            'nom' => 'required'
        ]);
    }
}
