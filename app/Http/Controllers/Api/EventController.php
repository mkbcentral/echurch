<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\ChurchEvent;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function events(Request $request){
        $request->validate(['per_page'=>'numeric|min:1|max:100']);
        $events=ChurchEvent::where('status','ONLINE')
                            ->paginate($request->input('per_page','5'));
                return EventResource::collection($events);

    }
}
