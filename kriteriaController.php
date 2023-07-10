<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kriteria;

class kriteriaController extends Controller {

    public function index() {
        return view('datakriteria', [
            'users' => kriteria::all(),
            'title' => 'Data kriteria'
        ]);
    }
    public function add() {
        return view('adddatakriteria',[
            'title' => 'Tambah Data kriteria'
        ]);
    }
    public function edit($id){

        $kriteria = kriteria::where('id', $id)->first();

        return view('editdatakriteria', [
            'kriteria' => $kriteria,
            'title' => 'Edit Data kriteria'
        ]);

    }

    public function update(Request $request, $id) {
        $kode_kriteria     = $request->input('kode_kriteria');
        $nama_kriteria       = $request->input('k_tangki');
        $bobot   = $request->input('silinder');
        $jenis = $request->input('harga');
        // $k_mesin = $request->input('k_mesin');

        $kriteria = kriteria::where('id', $id)->first();
        $kriteria->kode_kriteria     = $kode_kriteria;
        $kriteria->nama_kriteria     = $nama_kriteria;
        $kriteria->bobot = $bobot;
        $kriteria->jenis = $jenis;
        // $kriteria->k_mesin = $k_mesin;

        $kriteria->save();

        return redirect()->to('/kriteria');
    }


    public function dashboard(){
        $kriteria= kriteria::count();

        return view('main', compact('kriteria'));

    }

    public function store(Request $request) {
        $kode_kriteria      = $request->input('kode_kriteria');
        $nama_kriteria       = $request->input('nama_kriteria');
        $bobot   = $request->input('bobot');
        $jenis = $request->input('jenis');
        // $k_mesin = $request->input('k_mesin');
        // TODO: Compare $password and $rePassword

        $kriteria = new kriteria;
        $kriteria->kode_kriteria     = $kode_kriteria;
        $kriteria->nama_kriteria     = $nama_kriteria;
        $kriteria->bobot = $bobot;
        $kriteria->jenis = $jenis;
        // $kriteria->k_mesin = $k_mesin;
        $kriteria->save();

        return redirect()->to('/kriteria');
    }
    public function delete($id) {
        $kriteria = kriteria::where('id', $id)->first();
        $kriteria->delete();
        return redirect()->back();
    }
}
