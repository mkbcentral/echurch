<?php

namespace App\Http\Livewire\Admin\Church;

use App\Models\Church;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;

class ChurchManagement extends Component
{
    use WithFileUploads;
    public $state=[],$churchSelected,$churchIsOnline;
    public $logo_url,$name,$abreviation,$pastor_name,$phone,$email;
    protected $listeners=['makeChurchIsOnlineLsitener'=>'makeIsOnlaine'];
    public $selectedRows=[];
    public $selectedAllRows=false;
    public $status=null;
    public $queryString=['status'];
    public $onlinechurchCount,$offlinechurchCount,$allchurchCount;
    
    public function save(){
        $this->validateData();

        $church=new Church();
        if ($this->logo_url) {
            $logo=$this->logo_url;
            $path=$logo->store('logo','public');
            $church->logo_url=$path;
        }
        $church->name=$this->name;
        $church->abreviation=$this->abreviation;
        $church->pastor_name=$this->pastor_name;
        $church->phone=$this->phone;
        $church->email=$this->email;
        $church->save();
        $this->dispatchBrowserEvent('data-added',['message'=>"Church created successfull"]);
    }

    public function edit(Church $church){
        $this->churchSelected=$church;
        $this->name=$church->name;
        $this->abreviation=$church->abreviation;
        $this->pastor_name=$church->pastor_name;
        $this->phone=$church->phone;
        $this->email=$church->email;
    }

    public function update(){
        //$this->validateData();
        $this->churchSelected->name=$this->name;
        $this->churchSelected->abreviation=$this->abreviation;
        $this->churchSelected->phone=$this->phone;
        $this->churchSelected->email=$this->email;
        if ($this->logo_url!=null) {
            $logo=$this->logo_url;
            $path=$logo->store('logo','public');
            $this->churchSelected->logo_url=$path;
        }
        $this->churchSelected->update();
        $this->dispatchBrowserEvent('data-updated',['message'=>'Church update successfull !']);

    }

    public function validateData(){
       $this->validate([
            'name'=>'required',
            'abreviation'=>'nullable',
            'pastor_name'=>'required',
            'email'=>'email',
            'phone'=>'min:4',
            'logo_url'=>'image|mimes:png,jpg|nullable',
       ]);
    }

    public function updatedselectedAllRows($value){
        if ($value) {
            $this->selectedRows=$this->churchs->pluck('id')->map(function($id){
                return (string) $id;
            });
        }else{
            $this->reset(['selectedRows','selectedAllRows']);
        }
    }

    public function markOnlineSelectedRows(){
       Church::whereIn('id',$this->selectedRows)->update(['status'=>'ONLINE']);
       $this->dispatchBrowserEvent('data-updated',['message'=>'Churches marked online !']);
    }

    public function markOfflineSelectedRows(){
        Church::whereIn('id',$this->selectedRows)->update(['status'=>'OFFLINE']);
        $this->dispatchBrowserEvent('data-updated',['message'=>'Churches marked offline !']);
     }

    //COMPUTED PROPERTY
    public function getChurchsProperty(){
        return Church::when($this->status,function($query,$status){
            return $query->where('status',$status);
        })
        ->get();
    }

    public function filtedChurchByStatus($status=null){
       $this->status=$status;
    }
    public function mount(){
        $this->logo_url=null;
        $this->abreviation='';
        $this->phone='+243';
        $this->onlinechurchCount=Church::where('status','ONLINE')->count();
        $this->offlinechurchCount=Church::where('status','OFFLINE')->count();
        $this->allchurchCount=Church::all();
    }
    public function render()
    {
        $churchs=$this->churchs;
        return view('livewire.admin.church.church-management',['churchs'=>$churchs]);
    }
}
