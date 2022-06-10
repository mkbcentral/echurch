<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChurchResource;
use App\Models\Church;
use Illuminate\Http\Request;

class ChurchController extends Controller
{
    public function churches(Request $request){
        $request->validate(
            [
                'per_page'=>'numeric|min:1|max:100',

            ]
        );
        $churches=Church::paginate($request->input('per_page',10));
        return ChurchResource::collection($churches);
    }
}
