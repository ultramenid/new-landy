<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class FactsheetController extends Controller
{
    public function index(){
        $data = $this->getFactsheet();
        $title = 'MapBiomas Landy - Factsheet';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        return view('frontends.factsheet', compact('title', 'description', 'data'));
    }

     public function getSelect(){
        if (App::getLocale() == 'id') {
            return 'id, contentID as content';
        }else{
            return 'id, contentEN as content';
        }
    }

    public function getFactsheet(){
        return DB::table('pagefactsheet')
                ->selectRaw($this->getSelect())
                ->where('id', 1)
                ->first();
    }

    public function cmsfactsheet(){
        $title = 'MapBiomas Landy - Factsheet';
        $nav = 'factsheet';
        return view('backends.factsheet', compact('title', 'nav'));
    }
}
