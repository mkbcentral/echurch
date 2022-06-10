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
                            ->latest()
                            ->withCount('comments','likes')
                            ->with('likes',function($like){
                                return $like->where('user_id',auth()->user()->id)
                                            ->select('id','user_id','church_event_id')->get();
                            })
                            ->paginate($request->input('per_page','20'));
                return EventResource::collection($events);

    }
}
