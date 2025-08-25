<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class FaqComponent extends Component
{
    use WithPagination;
    public $deleteName, $deleteID, $deleter;
    public  $paginate = 10, $query = '';
     // refresh page on search
    public function search(){
        $this->resetPage();
    }
    public function closeDelete(){
        $this->deleter = false;
        $this->deleteName = null;
        $this->deleteID = null;
    }
    public function delete($id){

        //load data to delete function
        $dataDelete = DB::table('faq')->where('id', $id)->first();
        // $this->deleteName = $dataDelete->titleID;
        $this->deleteID = $dataDelete->id;

        $this->deleter = true;
    }
    public function deleting($id){
        DB::table('faq')->where('id', $id)->delete();
        Toaster::success('Succesfully delete faq');
        $this->closeDelete();
    }
    public function getFaq(){
        $sc = '%' . $this->query . '%';
        try {
            return  DB::table('faq')
                        ->select('id', 'questionID', 'questionEN')
                        ->where('questionID', 'like', $sc)
                        ->orderByDesc('id')
                        ->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }
    public function render()
    {
        $posts = $this->getFaq();
        return view('livewire.faq-component', compact('posts'));
    }
}
