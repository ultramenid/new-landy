<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Masmerise\Toaster\Toaster;

class EditMuralComponent extends Component
{
    use WithFileUploads;
    public $publishdate, $titleID, $titleEN, $photoID, $photoEN, $isactive, $fileID, $fileEN, $idMural;
    public $uphotoID, $uphotoEN;

    public function mount($id){
        $this->idMural = $id;
        $data = DB::table('murals')->where('id', $id)->first();
        $this->publishdate = $data->publishdate;
        $this->titleEN = $data->titleEN;
        $this->titleID = $data->titleID;
        $this->fileID = $data->fileID;
        $this->fileEN = $data->fileEN;
        $this->isactive = $data->status;
        $this->uphotoEN = $data->imgEN;
        $this->uphotoID = $data->imgID;
    }

    public function manualValidation(){
        if($this->titleID == '' ){
            Toaster::error('Title Indonesia is required!');
            return;
        }elseif($this->titleEN == '' ){
            Toaster::error('Title English is required!');
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

    protected function handlePhotoUpload($newPhoto, $existingPhoto, $uploadMethod){
        if (!$newPhoto) {
            return $existingPhoto;
        }

        Storage::delete([
            'public/files/photos/' . $existingPhoto,
            'public/files/photos/thumbnail/' . $existingPhoto
        ]);

        return $this->$uploadMethod();
    }

    public function storePosts(){
        if($this->manualValidation()){

            DB::table('murals')
            ->where('id', $this->idMural)
            ->update([
                'publishdate' => $this->publishdate,
                'titleID' => $this->titleID,
                'titleEN' => $this->titleEN,
                'fileID' => $this->fileID,
                'fileEN' => $this->fileEN,
                'imgID' => $nameID = $this->handlePhotoUpload($this->photoID, $this->uphotoID, 'uploadImageID'),
                'imgEN' => $nameEN = $this->handlePhotoUpload($this->photoEN, $this->uphotoEN, 'uploadImageEN'),
                'status' => $this->isactive,
                'updated_at' => Carbon::now('Asia/Jakarta')
            ]);

            redirect()->to('/cms/cmsmural');
        }
    }

    public function render()
    {
        return view('livewire.edit-mural-component');
    }
}
