<?php

namespace App\Http\Livewire\Admin\Event;

use App\Models\Church;
use App\Models\ChurchEvent;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditEvent extends Component
{
    use WithFileUploads;
    public $church,$event;
    public $state=[],$cover_image_url;
    
    public function mount(Church $church,ChurchEvent $event){
        $this->state=$event->toArray();
    }
    public function update(){
        if ($this->cover_image_url) {
            $cover=$this->cover_image_url;
            $path=$cover->store('cover/events','public');
            $this->event->cover_event_url=$path;
        }
        $this->event->title=$this->state['title'];
        $this->event->finished_at_date=$this->state['finished_at_date'];
        $this->event->started_at_date=$this->state['started_at_date'];
        $this->event->finished_at_time=$this->state['finished_at_time'];
        $this->event->started_at_time=$this->state['started_at_time'];
        $this->event->description=$this->state['description'];
        $this->event->adress=$this->state['adress'];
        $this->event->update();
        $this->dispatchBrowserEvent('data-updated',['message'=>"Event updated successfull"]);
        return redirect()->route('admin.event.management',$this->church);
    }
    public function render()
    {
        return view('livewire.admin.event.edit-event');
    }
}
