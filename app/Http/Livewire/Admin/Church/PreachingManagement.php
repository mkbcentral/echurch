<?php

namespace App\Http\Livewire\Admin\Church;

use App\Models\Church;
use Livewire\Component;
use App\Models\Preaching;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PreachingManagement extends Component
{
    use WithFileUploads;
    public $church,$preachingSelected,$preachingIsOnline;
    public $title,$cover_image_url,$audio_file_url,$predicator_name;
    public $preview_cover;
    public $selectedRows=[];
    public $selectedAllRows=false;
    public $status=null;
    public $queryString=['status'];
    public $onlinePreachingCount,$offlinePreachingCount,$allPreachingCount;
    public function mount(Church $church){
        $this->cover_image_url=null;
        $this->onlinePreachingCount=Preaching::where('status','ONLINE')->count();
        $this->offlinePreachingCount=Preaching::where('status','OFFLINE')->count();
        $this->allPreachingCount=Preaching::all();
    }

    public function save(){
        $this->validateData();
        $preaching=new Preaching();
        if ($this->cover_image_url!=null) {
            $cover=$this->cover_image_url;
            $path_cover=$cover->store('church/covers','public');
            $preaching->cover_image_url=$path_cover;
        }else{
            $this->dispatchBrowserEvent('data-error',['message'=>'Please, image cover miss']);
        }
        $audio=$this->audio_file_url;
        $path_audio=$audio->store('church/preachings','public');

        $preaching->title=$this->title;
        $preaching->predicator_name=$this->predicator_name;
        $preaching->audio_file_url=$path_audio;
        $preaching->church_id=$this->church->id;
        $preaching->save();

        $this->dispatchBrowserEvent('data-added',['message'=>'Prédication added successfull !']);
    }

    public function edit(Preaching $preaching){
        $this->title=$preaching->title;
        $this->cover_image_url=null;
        $this->audio_file_url=null;
        $this->title=$preaching->title;
        $this->predicator_name=$preaching->predicator_name;
        $this->preview_cover=$preaching->cover_image_url;
        $this->preachingSelected=$preaching;
    }

    public function update(){
        $this->preachingSelected->title=$this->title;
        $this->preachingSelected->predicator_name=$this->predicator_name;
        $preview_cover=$this->preachingSelected->cover_image_url;
        if ($this->cover_image_url) {
            $cover=$this->cover_image_url;
            $path_cover=$cover->store('church/covers','public');
            $this->preachingSelected->cover_image_url=$path_cover;
        }
        if ($this->audio_file_url) {
            $audio=$this->audio_file_url;
            $path_audio=$audio->store('church/preachings','public');
            $this->preachingSelected->audio_file_url=$path_audio;  
        }
        $this->preachingSelected->update();
        $this->dispatchBrowserEvent('data-updated',['message'=>'Church update successfull !']);

    }

    public function validateData(){
        $this->validate([
            'title'=>'required',
            'predicator_name'=>'required',
            'audio_file_url'=>'required|mimes:mp3,wav,m4a',
        ]);
    }

    public function updatedselectedAllRows($value){
        if ($value) {
            $this->selectedRows=$this->preachings->pluck('id')->map(function($id){
                return (string) $id;
            });
        }else{
            $this->reset(['selectedRows','selectedAllRows']);
        }
    }

    public function markOnlineSelectedRows(){
       Preaching::whereIn('id',$this->selectedRows)->update(['status'=>'ONLINE']);
       $this->dispatchBrowserEvent('data-updated',['message'=>'Churches marked online !']);
    }

    public function markOfflineSelectedRows(){
        Preaching::whereIn('id',$this->selectedRows)->update(['status'=>'OFFLINE']);
        $this->dispatchBrowserEvent('data-updated',['message'=>'Churches marked offline !']);
     }

    //COMPUTED PROPERTY
    public function getPreachingsProperty(){
        return Preaching::when($this->status,function($query,$status){
            return $query->where('status',$status);
        })
        ->where('church_id',$this->church->id)
        ->latest()
        ->get();
    }

    public function filtedChurchByStatus($status=null){
       $this->status=$status;
    }
    public function render()
    {
        $preachings=$this->preachings;;
        return view('livewire.admin.church.preaching-management',['preachings'=>$preachings]);
    }
}
