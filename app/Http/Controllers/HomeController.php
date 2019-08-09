<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home.gudang-dashboard');
    }

    public function laborDashboard()
    {
        return view('home.labor-dashboard');
    }
}
