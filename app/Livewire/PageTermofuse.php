<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class PageTermofuse extends Component
{
    public $contentEN, $contentID;

    public function mount(){
        $data = DB::table('pagetermofuse')->where('id', 1)->first();
        if($data){
            $this->contentEN = $data->contentEN;
            $this->contentID = $data->contentID;
        }else{
            $this->contentEN = '';
            $this->contentID = '';
        }
    }

    public function storePage(){
        if($this->manualValidation()){
            DB::table('pagetermofuse')
            ->updateOrInsert(
                ['name' => 'whoweare', 'id' => 1],
                [
                    'contentEN' => $this->contentEN,
                    'contentID' => $this->contentID,
                ]
            );
        //passing to toast
        Toaster::success('Succesfully update page termofuse');
        }
    }
    public function render()
    {
        return view('livewire.page-termofuse');
    }

    public function manualValidation(){
        if($this->contentEN == ''){
            Toaster::error('Content english is required');

            return;

        }elseif($this->contentID == ''){
            Toaster::error('Content indonesia is required');
            return;
        }
        return true;
    }
}
