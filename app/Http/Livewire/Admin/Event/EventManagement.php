<?php

namespace App\Http\Livewire\Admin\Event;

use App\Http\Livewire\Admin\Church\ChurchManagement;
use Livewire\Component;
use App\Models\Church;
use App\Models\ChurchEvent;
use Livewire\WithFileUploads;

class EventManagement extends Component
{
    use WithFileUploads;
    public $church,$event;
    public $selectedRows=[];
    public $selectedAllRows=false;
    public $status=null;
    public $queryString=['status'];
    public $onlinechurchEventCount,$offlinechurchEventCount,$allchurchEventCount;

    function updatedselectedAllRows($value){
        if ($value) {
            $this->selectedRows=$this->church_events->pluck('id')->map(function($id){
                return (string) $id;
            });
        }else{
            $this->reset(['selectedRows','selectedAllRows']);
        }
    }

    public function markOnlineSelectedRows(){
       ChurchEvent::whereIn('id',$this->selectedRows)->update(['status'=>'ONLINE']);
       $this->dispatchBrowserEvent('data-updated',['message'=>'Churches marked online !']);
    }

    public function markOfflineSelectedRows(){
        ChurchEvent::whereIn('id',$this->selectedRows)->update(['status'=>'OFFLINE']);
        $this->dispatchBrowserEvent('data-updated',['message'=>'Churches marked offline !']);
     }

    //COMPUTED PROPERTY
    public function getChurchEventsProperty(){
        return ChurchEvent::when($this->status,function($query,$status){
            return $query->where('status',$status);
        })
        ->where('church_id',$this->church->id)
        ->get();
    }

    public function filtedChurchByStatus($status=null){
       $this->status=$status;
    }

    public function validateData(){
        $this->validate([
            'title'=>'required',
            'stated_at_date'=>'date|nullable',
            'finished_at_date'=>'date|nullable',
            'started_time'=>'nullable',
            'finished_time'=>'nullable',
            'description'=>'nullable'
        ]);
    }

    public function mount(Church $church){
        $this->phone='+243';
        $this->onlinechurchEventCount=ChurchEvent::where('status','ONLINE')
                ->where('church_id',$this->church->id)->count();
        $this->offlinechurchEventCount=ChurchEvent::where('status','OFFLINE')
                ->where('church_id',$this->church->id)->count();
        $this->allchurchEventCount=ChurchEvent::where('church_id',$this->church->id)->count();
    }
    public function render()
    {
        $church_events=$this->church_events;
        return view('livewire.admin.event.event-management',['church_events'=>$church_events]);
    }
}
