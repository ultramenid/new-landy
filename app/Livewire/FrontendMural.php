<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class FrontendMural extends Component
{
    public $paginate = 10;
    use WithPagination;


    public function getSelectMural(){
        if (app()->getLocale() == 'id') {
            return 'id, titleID as title, imgID as img, fileID as file';
        } else {
            return 'id, titleEN as title, imgEN as img, fileEN as file';
        }
    }

    public function getMural(){
        return DB::table('murals')
        ->selectRaw($this->getSelectMural())
        ->where('publishdate', '<', Carbon::now('Asia/Jakarta'))
        ->where('status', 1)
        ->orderBy('publishdate','desc')
        ->paginate($this->paginate);
    }
    public function render()
    {
        $data = $this->getMural();
        return view('livewire.frontend-mural', compact('data'));
    }
}
