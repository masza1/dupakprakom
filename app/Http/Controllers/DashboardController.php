<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function sekretariat(){
        return view('sekretariat.dashboard');
    }
    public function penilai(){
        return view('penilai.dashboard');
    }
    public function prakom(){
        return view('prakom.dashboard');
    }
}
