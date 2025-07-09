<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class RefmapController extends Controller
{
    public function getSelect(){
        if (App::getLocale() == 'id') {
            return 'id, contentID as content';
        }else{
            return 'id, contentEN as content';
        }
    }

    public function getRefmap(){
        return DB::table('pagerefmap')
                ->selectRaw($this->getSelect())
                ->where('id', 1)
                ->first();
    }

     public function index(){
        $title = 'MapBiomas Landy - Reference Map';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        $data = $this->getRefmap();
        return view('frontends.refmap', compact('title', 'description', 'data'));
    }

    public function cmsrefmap(){
        $title = 'MapBiomas Landy - Reference Map';
        $nav = 'pages';
        return view('backends.refmap', compact('title', 'nav'));
    }
}
