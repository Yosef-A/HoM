<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class AppController extends Controller
{
    //
    public function init()
    {
        //
        $user = Auth::user();
        return response()->json(['user' => $user],200);

    }
    public function login(Request $request)
    {
        //
        if (Auth::attempt(['username' => $request->username,'password' => $request->password],true))
        {
            return response()->json(Auth::user(),200);
            
        }
        else{
            return response()->json(['error'=> 'could not log you in.'],401);
        }
    
    }


    public function register(Request $request)
    {
        //check if the username exist
        $user = User::where('username',$request->username)->first();
        if (isset($user->id))
        {
      return response()->json(['error'=> 'username already exists.'],401);
        }
        $user= new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->userType = $request->userType;
        $user->password = bcrypt($request->password);
        $user->save();
        Auth::login($user);
        return response()->json($user,200);
        
    }
    public function logout()
    {
        //
        Auth::logout();
       // return response()->json(true,200);
    }


}