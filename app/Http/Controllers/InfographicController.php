<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfographicController extends Controller
{
    public function cmsinfographic()
    {
        $title = 'MapBiomas Landy - Infographic';
        $nav = 'infographic';
        return view('backends.infographic', compact('title', 'nav'));
    }

    public function addinfographic()
    {
        $title = 'MapBiomas Landy - Add Infographic';
        $nav = 'infographic';
        return view('backends.addinfographic', compact('title', 'nav'));
    }

    public function index(){
        $title = 'MapBiomas Landy - Infographics';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        return view('frontends.infographics', compact('title', 'description'));
    }

    public function edit($id){
        $title = 'MapBiomas Landy - edit mural';
        $nav = 'infographic';
        $idInfographic = $id;
        return view('backends.editInfographic', compact('title', 'nav', 'idInfographic'));
    }
}
