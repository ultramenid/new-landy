<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class DownloadsController extends Controller
{
    public function downloads()
    {
        $title = 'MapBiomas Landy - Downloads';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        return view('frontends.downloads', compact('title', 'description'));
    }

    public function getSelect(){
        if (App::getLocale() == 'id') {
            return 'id, contentID as content';
        }else{
            return 'id, contentEN as content';
        }
    }

    public function getLandsatmosaic(){
        return DB::table('pagelandsatmosaic')
                ->selectRaw($this->getSelect())
                ->where('id', 1)
                ->first();
    }

    public function getCollectionmap(){
        return DB::table('pagecollectionmap')
                ->selectRaw($this->getSelect())
                ->where('id', 1)
                ->first();
    }
    public function landsatmosaics()
    {
        $title = 'MapBiomas Landy - Landsat Mosaics';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        $data = $this->getLandsatmosaic();
        return view('frontends.landsatmosaics', compact('title', 'description', 'data'));
    }

    public function collectionmap()
    {
        $title = 'MapBiomas Landy - Collection Map';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        $data = $this->getCollectionmap();
        return view('frontends.collectionmap', compact('title', 'description', 'data'));
    }

    public function legendcode()
    {
        $title = 'MapBiomas Landy - Legend Code';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        return view('frontends.legendcode', compact('title', 'description'));
    }


    public function pagelandsatmosaics()
    {
        $title = 'MapBiomas Landy - Landsat Mosaics';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        $nav = "pages";
        return view('backends.landsatmosaics', compact('title', 'description','nav'));
    }

    public function pagecollectionmap()
    {
        $title = 'MapBiomas Landy - Landsat Mosaics';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        $nav = "pages";
        return view('backends.collectionmap', compact('title', 'description','nav'));
    }


}
