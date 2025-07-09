<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ATBDController extends Controller
{
    public function atbd()
    {
        $title = 'MapBiomas Landy - ATBD';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        return view('frontends.atbd', compact('title', 'description'));
    }
}
