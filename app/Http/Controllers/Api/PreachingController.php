<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PreachingResource;
use App\Models\Preaching;
use Illuminate\Http\Request;

class PreachingController extends Controller
{
    public function preachings(Request $request,$id){
        $prechings=Preaching::where('church_id',$id)->get();
        return PreachingResource::collection($prechings);
    }
}
