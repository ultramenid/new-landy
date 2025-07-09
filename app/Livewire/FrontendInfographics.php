<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class FrontendInfographics extends Component
{
    public $paginate = 10;
    use WithPagination;



    public function getSelectInfographic(){
        if (app()->getLocale() == 'id') {
            return 'id, titleID as title, imgID as img, slug';
        } else {
            return 'id, titleEN as title, imgEN as img, slug';
        }
    }

    public function getInfographics(){
        return DB::table('infographic')
        ->selectRaw($this->getSelectInfographic())
        ->where('publishdate', '<', Carbon::now('Asia/Jakarta'))
        ->where('status', 1)
        ->orderBy('publishdate','desc')
        ->paginate($this->paginate);
    }
    public function render()
    {
        $data = $this->getInfographics();
        return view('livewire.frontend-infographics', compact('data'));
    }
}
