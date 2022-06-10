<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:4|confirmed',
            'password_confirmation'=>'min:4'
        ]);

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        return $this->login($request);
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:4',
        ]);
        $creds=$request->only(['email','password']);
        if (Auth::attempt($creds)) {
            $user =auth()->user();
           return response()->json([
                'user'=>$user,
                'token'=>$user->createToken('token')->plainTextToken
           ]);
        } else {
            return response()->json([
                'message'=>'Make sure your email and password'
           ],403);
        }

    }

    public function updateProfile(Request $request,$id){
        $user=User::find($id);
        $image=$this->saveImage($request->avatar,'avatars');
        $user->avatar=$image;
        $user->update();
        return response()->json([
            'Profile'=>$image
       ],200);
    }
    public function user(){
        return response()->json([
            'user'=>auth()->user(),
            'token'=>request()->bearerToken()
        ]);
    }
}
