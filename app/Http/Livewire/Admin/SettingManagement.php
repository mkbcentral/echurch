<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingManagement extends Component
{
    use WithFileUploads;
    public $state=[];

    public function mount(){
        $this->state=Setting::first()==null?[]:Setting::first()->toArray();
    }
    public function updateSettings(){
        $setting=Setting::first();
        if ($setting) {

            $logo=$this->state['app_logo_url'];
            $path=$logo->store('logo/settings/','public');
            $setting->app_logo_url=$path;
            $setting->name_app=$this->state['name_app'];
            $setting->sidebar_collapse=$this->state['sidebar_collapse'];
            $setting->is_dark_mode=$this->state['is_dark_mode'];
            $setting->update();
            $this->dispatchBrowserEvent('data-updated',['message'=>"Settings updated successfull!"]);
        } else {
            $sets=new Setting();
            $logo=$this->state['app_logo_url'];
            $path=$logo->store('logo/settings/','public');
            $sets->app_logo_url=$path;
            $sets->name_app=$this->state['name_app'];
            $sets->sidebar_collapse=$this->state['sidebar_collapse'];
            $sets->is_dark_mode=$this->state['is_dark_mode'];
            $sets->save();
           $this->dispatchBrowserEvent('data-added',['message'=>"Settings added successfull!"]);
        }
        Cache::forget('setting');

    }
    public function render()
    {
        return view('livewire.admin.setting-management');
    }
}
