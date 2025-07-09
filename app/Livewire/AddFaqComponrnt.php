<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class AddFaqComponrnt extends Component
{
    public $questionEN, $answerEN, $questionID, $answerID;

    public function storeAksi(){
        if($this->manualValidation()){
            DB::table('faq')->insert([
                'questionID' => $this->questionID,
                'questionEN' => $this->questionEN,
                'answerID' => $this->answerID,
                'answerEN' => $this->answerEN,
                'created_at' => Carbon::now('Asia/Jakarta')
            ]);
        }
        redirect()->to('/cms/listfaq');
    }

    public function render()
    {
        return view('livewire.add-faq-componrnt');
    }
    public function manualValidation(){
        if($this->questionID == ''){
            Toaster::error('Question Indonesia is required!');
            return;
        }elseif($this->answerID == '' ){
            Toaster::error('Answer Indonesia is required!');
            return;
        }elseif($this->questionEN == '' ){
            Toaster::error('Question English is required!');
            return;
        }elseif($this->answerEN == '' ){
            Toaster::error('Answer English is required!');
            return;
        }
        return true;
    }
}
