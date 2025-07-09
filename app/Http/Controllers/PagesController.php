<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function cmsabout(){
        $title = 'MapBiomas Landy - About';
        $nav = 'pages';
        return view('backends.about', compact('title', 'nav'));
    }

    public function cmstermofuse(){
        $title = 'MapBiomas Landy - Term of use';
        $nav = 'pages';
        return view('backends.termofuse', compact('title', 'nav'));
    }

    public function cmsatbd(){
        $title = 'MapBiomas Landy - ATBD';
        $nav = 'pages';
        return view('backends.atbd', compact('title', 'nav'));
    }

    public function getSelect(){
        if (App::getLocale() == 'id') {
            return 'id, contentID as content';
        }else{
            return 'id, contentEN as content';
        }
    }

    public function getTermofuse(){
        return DB::table('pagetermofuse')
                ->selectRaw($this->getSelect())
                ->where('id', 1)
                ->first();
    }

    public function getatbd(){
        return DB::table('pageatbd')
                ->selectRaw($this->getSelect())
                ->where('id', 1)
                ->first();
    }

    public function getPageData(){
        return DB::table('pageabout')
                ->selectRaw($this->getSelect())
                ->where('id', 1)
                ->first();
    }

    public function about(){
        $title = 'MapBiomas Landy - about';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        $data = $this->getPageData();
        return view('frontends.about', compact('description', 'title', 'data'));
    }

    public function refrencemap(){
        $title = 'MapBiomas Landy - refrence map';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        return view('frontends.refrencemap', compact('title', 'description'));
    }

    public function termsofuse(){
        $title = 'MapBiomas Landy - terms of use';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        $data = $this->getTermofuse();
        return view('frontends.termsofuse', compact('title', 'description', 'data'));
    }




}
