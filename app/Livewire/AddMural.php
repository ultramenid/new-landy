<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Masmerise\Toaster\Toaster;

class AddMural extends Component
{
    use WithFileUploads;
    public $publishdate, $titleID, $titleEN, $photoID, $photoEN, $isactive=0, $fileID, $fileEN;

    public function manualValidation(){
        if($this->titleID == '' ){
            Toaster::error('Title Indonesia is required!');
            return;
        }elseif($this->titleEN == '' ){
            Toaster::error('Title English is required!');
            return;
        }elseif($this->photoID == '' ){
            Toaster::error('Image Indonesia is required!');
            return;
        }elseif($this->photoEN == '' ){
            Toaster::error('Image English is required!');
            return;
        }elseif($this->fileID == '' ){
            Toaster::error('File Indonesia is required!');
            return;
        }elseif($this->fileEN == '' ){
            Toaster::error('File English is required!');
            return;
        }elseif($this->publishdate == '' ){
            Toaster::error('Publish date is required!');
            return;
        }
        return true;
    }

    public function uploadImageID(){
        $file = $this->photoID->store('public/files/photos');
        $foto = $this->photoID->hashName();
        return $foto;
    }
    public function uploadImageEN(){
        $file = $this->photoEN->store('public/files/photos');
        $foto = $this->photoEN->hashName();
        return $foto;
    }

    public function updatedPhotoID($photo){
        $extension = pathinfo($photo->getFilename(), PATHINFO_EXTENSION);
        if (!in_array($extension, ['png', 'jpeg', 'bmp', 'gif','jpg','webp','mp4', 'avi', '3gp', 'mov', 'm4a'])) {
           $this->reset('photoID');
           Toaster::error('File not supported!');
        }

    }
    public function updatedPhotoEN($photo){
        $extension = pathinfo($photo->getFilename(), PATHINFO_EXTENSION);
        if (!in_array($extension, ['png', 'jpeg', 'bmp', 'gif','jpg','webp','mp4', 'avi', '3gp', 'mov', 'm4a'])) {
           $this->reset('photoEN');
           Toaster::error('File not supported!');
        }

    }

    public function storePosts(){
        if($this->manualValidation()){
            DB::table('murals')->insert([
                'publishdate' => $this->publishdate,
                'titleID' => $this->titleID,
                'titleEN' => $this->titleEN,
                'fileID' => $this->fileID,
                'fileEN' => $this->fileEN,
                'imgID' => $this->uploadImageID(),
                'imgEN' => $this->uploadImageEN(),
                'status' => $this->isactive,
                'created_at' => Carbon::now('Asia/Jakarta')
            ]);

            redirect()->to('/cms/cmsmural');
            // $this->redirect('/cms/listnews', navigate: true);
        }
    }
    public function render()
    {
        return view('livewire.add-mural');
    }
}
