<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class GlosariumController extends Controller
{
    public function getSelect(){
        if (App::getLocale() == 'id') {
            return 'id, contentID as content';
        }else{
            return 'id, contentEN as content';
        }
    }

    public function getGee(){
        return DB::table('pageglosarium')
                ->selectRaw($this->getSelect())
                ->where('id', 1)
                ->first();
    }

     public function index(){
        $title = 'MapBiomas Landy - Glossary';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        $data = $this->getGEE();
        return view('frontends.glossary', compact('title', 'description', 'data'));
    }

    public function cmsglosarium(){
        $title = 'MapBiomas Landy - Glossary';
        $nav = 'pages';
        return view('backends.glossary', compact('title', 'nav'));
    }
}
