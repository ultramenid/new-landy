<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    public function index(){
        $title = 'MapBiomas Landy - faq';
        $nav = 'faq';
        return view('backends.faq', compact('title', 'nav'));
    }

    public function add(){
        $title = 'MapBiomas Landy - add faq';
        $nav = 'faq';
        return view('backends.addfaq', compact('title', 'nav'));
    }

    public function edit($id){
        $title = 'MapBiomas Landy - edit faq';
        $nav = 'faq';
        $idFaq = $id;
        return view('backends.editfaq', compact('title', 'nav', 'idFaq'));
    }

    public function getSelect(){
        if (App::getLocale() == 'id') {
            return 'id, questionID as question, answerID as answer';
        }else{
            return 'id, questionEN as question, answerEN as answer';
        }
    }
    public function getFAQ(){
        return DB::table('faq')
                ->selectRaw($this->getSelect())
                ->get();
    }

    public function listFaq(){
        $title = 'MapBiomas Landy - FAQ';
        $description = "Bagian dari gerakan global MapBiomas Network untuk menghasilkan peta tutupan dan penggunaan lahan tahunan.";
        $data = $this->getFAQ();
        return view('frontends.faq', compact('title', 'description', 'data'));
    }
}
