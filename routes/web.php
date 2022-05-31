<?php

use App\Http\Livewire\Admin\Church\ChurchManagement;
use App\Http\Livewire\Admin\Church\PreachingManagement;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard\DashboardManagement;
use App\Http\Livewire\Admin\Event\CreateEvent;
use App\Http\Livewire\Admin\Event\EditEvent;
use App\Http\Livewire\Admin\Event\EventManagement;
use App\Http\Livewire\Admin\SettingManagement;
use App\Http\Livewire\User\UserProfile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashbaord/main',DashboardManagement::class)
            ->name('admin.dashboard.main');
    Route::get('/admin/church-management',ChurchManagement::class)
            ->name('admin.church.management');
    Route::get('/admin/church/preaching/{church}/management',PreachingManagement::class)
            ->name('admin.church.preaching.management');
    Route::get('/admin/settings',SettingManagement::class)->name('admin.settings');
    Route::get('user/user-profile',UserProfile::class)->name('user.profile');
    Route::get('/admin/event/church/{church}/management',EventManagement::class)
            ->name('admin.event.management');
    Route::get('create/event/{church}/church',CreateEvent::class)
            ->name('admin.event.create');
    Route::get('edit/event/{church}/{event}/church',EditEvent::class)
            ->name('admin.event.edit');
});
