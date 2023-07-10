<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use Illuminate\Http\Request;
use App\Models\User;

class mobilController extends Controller {

    public function index() {
        return view('datamobil', [
            'users' => mobil::all(),
            'title' => 'Data mobil'
        ]);
    }
    public function add() {
        return view('adddatamobil',[
            'title' => 'Tambah Data mobil'
        ]);
    }
    public function edit($id){

        $mobil = mobil::where('id', $id)->first();

        return view('editdatamobil', [
            'mobil' => $mobil,
            'title' => 'Edit Data mobil'
        ]);

    }

    public function update(Request $request, $id) {
        $merk      = $request->input('merk');
        $ram       = $request->input('ram');
        $type   = $request->input('type');
        $tanggal = $request->input('tanggal');

        $mobil = mobil::where('id', $id)->first();
        $mobil->merk  = $merk;
        $mobil->ram     = $ram;
        $mobil->type = $type;
        $mobil->tanggal = $tanggal;

        $mobil->save();

        return redirect()->to('/mobil');
    }


    public function dashboard(){
        $mobil= mobil::count();

        return view('main', compact('mobil'));

    }

    public function store(Request $request) {
        $merk       = $request->input('merk');
        $ram       = $request->input('ram');
        $type   = $request->input('type');
        $tanggal = $request->input('tanggal');
        // TODO: Compare $password and $rePassword

        $mobil           = new mobil;
        $mobil->merk     = $merk ;
        $mobil->ram     = $ram;
        $mobil->type = $type; // Don't forget to encryp!s
        $mobil->tanggal = $tanggal;

        $mobil->save();

        return redirect()->to('/mobil');
    }
    public function delete($id) {
        $mobil = mobil::where('id', $id)->first();
        $mobil->delete();
        return redirect()->back();
    }
}
