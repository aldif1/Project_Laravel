<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller {

    public function index() {

        $mobil= mobil::count();
        $kriteria= Kriteria::count();

        return view('main',[
            'title' => 'Dashboard'
        ], compact('mobil','kriteria'))
        ;
    }
}
