<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class ListMural extends Component
{
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
        $dataDelete = DB::table('mural')->where('id', $id)->first();
        $this->deleteName = $dataDelete->titleID;
        $this->deleteID = $dataDelete->id;

        $this->deleter = true;
    }
    public function deleting($id){
        DB::table('mural')->where('id', $id)->delete();

        Toaster::success('Succesfully delete news');


        $this->closeDelete();
    }
    public function getNews(){
        $sc = '%' . $this->query . '%';
        try {
            return  DB::table('murals')
                        ->select('id', 'titleEN', 'imgEN', 'status', 'publishdate')
                        ->where('titleEN', 'like', $sc)
                        ->orderByDesc('publishdate')
                        ->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }
    public function render()
    {
        $posts = $this->getNews();
        return view('livewire.list-mural', compact('posts'));
    }
}
