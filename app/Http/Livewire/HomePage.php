<?php

namespace App\Http\Livewire;

use App\Models\Church;
use Livewire\Component;

class HomePage extends Component
{
    public $STATUS="ONLINE";
    public function render()
    {
        $churchs=Church::where('status',$this->STATUS)->get();
        return view('livewire.home-page',['churchs'=>$churchs]);
    }
}
