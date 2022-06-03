<?php

namespace App\Http\Livewire\Admin\Event;

use App\Models\Church;
use App\Models\ChurchEvent;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateEvent extends Component
{
    use WithFileUploads;
    public $church;
    public $state=[],$cover_image_url;

    public function validateData(){
        Validator::make(
            $this->state,
            [
                'title'=>'required',
            ]
        )->validate();
    }
    public function save(){
        $this->validateData();
        $event=new ChurchEvent();
        if ($this->cover_image_url) {
            $cover=$this->cover_image_url;
            $path=$cover->store('cover/events','public');
            $event->cover_event_url=$path;
        }
        $event->title=$this->state['title'];
        $event->started_at_date=$this->state['started_date'];
        $event->finished_at_date=$this->state['finished_date'];
        $event->started_at_time=$this->state['started_time'];
        $event->finished_at_time=$this->state['finished_time'];
        $event->adress=$this->state['adress'];
        $event->description=$this->state['description'];
        $event->church_id=$this->church->id;
        $event->save();
        $this->dispatchBrowserEvent('data-added',['message'=>"Event created successfull"]);
        return redirect()->route('admin.event.management',$this->church);
    }

    public function mount(Church $church){

    }
    public function render()
    {
        return view('livewire.admin.event.create-event');
    }
}
