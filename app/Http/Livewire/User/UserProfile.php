<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;

class UserProfile extends Component
{
    use WithFileUploads;
    public $state=[];
    public $avatar;
    public function mount(){
        $this->state=auth()->user()->only(['name','email']);
    }
    public function updateProfile(UpdateUserProfileInformation $updater){
        $updater->update(auth()->user(),[
            'name'=>$this->state['name'],
            'email'=>$this->state['email'],
        ]);
        $this->emit('nameChanged',auth()->user()->name);
        $this->dispatchBrowserEvent('data-updated',['message'=>'Profil update successfull !']);
    }

    public function updatedAvatar(){
        $preview=auth()->user()->avatar;
        $avatar_name=time().'_'.$this->avatar->getClientOriginalName();
        $avatar_path = $this->avatar->storeAs('avatars', $avatar_name,'public');
        $user=auth()->user();
        $user->avatar=$avatar_path;
        $user->update();
        Storage::disk('public')->delete($preview);
        $this->cleanupOldUploads();
        $this->dispatchBrowserEvent('data-updated',['message'=>'Profil avatar update successfull !']);
    }

    public function changePassword(UpdateUserPassword $updater)
    {
        $updater->update(auth()->user(),[
            $attributes=Arr::only($this->state,['current_password','password','password_confirmation'])
        ]);
        collect($attributes)->map(fn($value,$key)=>$this->state[$key]='');

        $this->dispatchBrowserEvent('data-updated',['message'=>'Password changed successfull !']);
    }

    protected function cleanupOldUploads()
    {
        $storage = Storage::disk('local');
        foreach ($storage->allFiles('livewire-tmp') as $filePathname) {
            // On busy websites, this cleanup code can run in multiple threads causing part of the output
            // of allFiles() to have already been deleted by another thread.
            if (! $storage->exists($filePathname)) continue;
            $yesterdaysStamp = now()->subSecond(5)->timestamp;
            if ($yesterdaysStamp > $storage->lastModified($filePathname)) {
                $storage->delete($filePathname);
            }
        }
    }
    public function render()
    {
        return view('livewire.user.user-profile');
    }
}
