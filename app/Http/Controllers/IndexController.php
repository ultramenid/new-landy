<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function getSelectNews(){
        if (app()->getLocale() == 'id') {
            return 'id, titleID as title, descriptionID as description, img, slug';
        } else {
            return 'id, titleEN as title, descriptionEN as description, img, slug';
        }
    }

    public function getSelectInfographic(){
        if (app()->getLocale() == 'id') {
            return 'id, titleID as title, imgID as img, slug';
        } else {
            return 'id, titleEN as title, imgEN as img, slug';
        }
    }

    public function getInfographic(){
        return DB::table('infographic')
        ->selectRaw($this->getSelectInfographic())
        ->where('publishdate', '<', Carbon::now('Asia/Jakarta'))
        ->where('status', 1)
        ->orderBy('publishdate','desc')
        ->first();
    }

    public function getNews(){
        return DB::table('news')
        ->selectRaw($this->getSelectNews())
        ->where('publishdate', '<', Carbon::now('Asia/Jakarta'))
        ->where('category', 'news')
        ->where('status', 1)
        ->orderBy('publishdate','desc')
        ->take(2)
        ->get();
    }
    public function getEvent(){
        return DB::table('news')
        ->selectRaw($this->getSelectNews())
        ->where('publishdate', '<', Carbon::now('Asia/Jakarta'))
        ->where('category', 'event')
        ->where('status', 1)
        ->orderBy('publishdate','desc')
        ->take(2)
        ->get();
    }

    public function index(){
        $title = 'MapBiomas Indonesia - Landy';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        $news = $this->getNews();
        $event = $this->getEvent();
        $infographic = $this->getInfographic();
        return view('frontends.index', compact('title', 'description', 'news', 'event', 'infographic'));
    }
}
