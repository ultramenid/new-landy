<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuralController extends Controller
{
    public function cmsmural()
    {
        $title = 'MapBiomas Landy - Mural';
        $nav = 'mural';
        return view('backends.mural', compact('title', 'nav'));
    }

    public function addmural()
    {
        $title = 'MapBiomas Landy - Add Mural';
        $nav = 'mural';
        return view('backends.addmural', compact('title', 'nav'));
    }

    public function index()
    {
        $title = 'MapBiomas Landy - Mural';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        return view('frontends.mural', compact('title', 'description'));
    }

    public function edit($id){
        $title = 'MapBiomas Landy - edit mural';
        $nav = 'mural';
        $idMural = $id;
        return view('backends.editMural', compact('title', 'nav', 'idMural'));
    }
}
