<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class EditFaqComponent extends Component
{
    public $questionID, $questionEN, $answerID, $answerEN, $idFaq;

    public function mount($id){
        $data = DB::table('faq')->where('id', $id)->first();
        $this->questionID = $data->questionID;
        $this->questionEN = $data->questionEN;
        $this->answerEN = $data->answerEN;
        $this->answerID = $data->answerID;
        $this->idFaq = $id;
    }

    public function storeAksi(){
        if($this->manualValidation()){
            DB::table('faq')->where('id', $this->idFaq)->update([
                'questionID' => $this->questionID,
                'questionEN' => $this->questionEN,
                'answerEN' => $this->answerEN,
                'answerID' => $this->answerID
            ]);
        }
        Toaster::success('Succesfully update faq');
    }

    public function render()
    {
        return view('livewire.edit-faq-component');
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
