<?php

namespace App\Http\Controllers;

use App\Models\alternatif;
use Illuminate\Http\Request;
use App\Models\User;

class alternatifController extends Controller {

    public function index() {
        return view('dataalternatif', [
            'users' => alternatif::all(),
            'title' => 'Data alternatif'
        ]);
    }
    public function add() {
        return view('adddataalternatif',[
            'title' => 'Tambah Data alternatif'
        ]);
    }
    public function edit($id){

        $alternatif = alternatif::where('id', $id)->first();

        return view('editdataalternatif', [
            'alternatif' => $alternatif,
            'title' => 'Edit Data alternatif'
        ]);

    }

    public function update(Request $request, $id) {
        $kode_alternatif      = $request->input('kode_alternatif');
        $harga       = $request->input('harga');
        $ram   = $request->input('ram');
        $memori = $request->input('memori');
        $prosesor = $request->input('prosesor');
        $kamera = $request->input('kamera');

        $alternatif = alternatif::where('id', $id)->first();
        $alternatif->kode_alternatif  = $kode_alternatif;
        $alternatif->harga     = $harga;
        $alternatif->ram = $ram;
        $alternatif->memori = $memori;
        $alternatif->memori = $prosesor;
        $alternatif->kamera = $kamera;

        $alternatif->save();

        return redirect()->to('/alternatif');
    }


    public function dashboard(){
        $alternatif= alternatif::count();

        return view('main', compact('alternatif'));

    }

    public function store(Request $request) {
        $kode_alternatif      = $request->input('kode_alternatif');
        $harga       = $request->input('harga');
        $ram   = $request->input('ram');
        $memori = $request->input('memori');
        $prosesor = $request->input('prosesor');
        $kamera = $request->input('kamera');
        // TODO: Compare $password and $rePassword

        $alternatif           = new alternatif();
        $alternatif->kode_alternatif     = $kode_alternatif ;
        $alternatif->harga     = $harga;
        $alternatif->ram = $ram; // Don't forget to encryp!s
        $alternatif->memori = $memori;
        $alternatif->prosesor = $prosesor;
        $alternatif->kamera = $kamera;

        $alternatif->save();

        return redirect()->to('/alternatif');
    }
    public function delete($id) {
        $alternatif = alternatif::where('id', $id)->first();
        $alternatif->delete();
        return redirect()->back();
    }
}
