<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function login(){
        $title = 'MapBiomas Landy - Login';
        return view('backends.login', compact('title'));
    }

    public function index(){
        $title = 'MapBiomas Landy - Dashboard';
        $nav = 'dashboard';
        return view('backends.dashboard', compact('title', 'nav'));
    }
}
