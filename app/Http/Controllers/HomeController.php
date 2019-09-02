<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alat;
use App\Bahan;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function root()
    {
        if(auth()->user()->role == 1) {
            return redirect(route('gudang.dashboard'));
        }else if(auth()->user()->role == 2) {
            return redirect(route('labor.dashboard'));
        }
    }

    public function gudangDashboard()
    {
        $alat = Alat::all();
        $bahan = Bahan::all();
        return view('home.gudang-dashboard')->with('alats', $alat)->with('bahans', $bahan);
    }

    public function laborDashboard()
    {
        return view('home.labor-dashboard');
    }
}
