<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function getSelect(){
        if (App::getLocale() == 'id') {
            return 'id, contentID as content';
        }else{
            return 'id, contentEN as content';
        }
    }

    public function getStatistics(){
        return DB::table('pagestatistics')
                ->selectRaw($this->getSelect())
                ->where('id', 1)
                ->first();
    }
    public function index(){
        $title = 'MapBiomas Landy - Statistics';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        $data = $this->getStatistics();
        return view('frontends.statistics', compact('title', 'description', 'data'));
    }

    public function cmsstatistics(){
        $title = 'MapBiomas Landy - statistics';
        $nav = 'pages';
        return view('backends.statistics', compact('title', 'nav'));
    }
}
