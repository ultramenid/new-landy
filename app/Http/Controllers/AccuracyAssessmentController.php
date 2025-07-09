<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class AccuracyAssessmentController extends Controller
{

     public function getSelect(){
        if (App::getLocale() == 'id') {
            return 'id, contentID as content';
        }else{
            return 'id, contentEN as content';
        }
    }

    public function getAccuracy(){
        return DB::table('pageaccuracy')
                ->selectRaw($this->getSelect())
                ->where('id', 1)
                ->first();
    }

     public function index(){
        $title = 'MapBiomas Landy - Accuracy Assessment';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        $data = $this->getAccuracy();
        return view('frontends.accuracy', compact('title', 'description', 'data'));
    }
     public function cmsaccuracy(){
        $title = 'MapBiomas Landy - Accuracy Assessment';
        $nav = 'pages';
        return view('backends.accuracy', compact('title', 'nav'));
    }
}
