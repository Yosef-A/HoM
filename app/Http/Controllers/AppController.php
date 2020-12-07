<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AppController extends Controller
{
  public function init()
  {
      $user = Auth::user();

      return response()->json(['user' => $user], 200); 
  }    
  
  public function login(request $request)
  {
      if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)){
          return response()->json(Auth::user(),200);
      }
      else{
          return response()->json(['error' => 'could not log you in'], 401);
      }
  }

  public function register(request $request)
  {
     $user = User::where('email',$request->email)->first();

     if(isset($user->id)){
        return response()->json(['error' => 'email already exists'], 401);
     }

     $user = new User();

     $user->First_Name = $request->First_Name;
     $user->Last_Name = $request->Last_Name;
     $user->Phone_Number = $request->Phone_Number;
     $user->User_Type = $request->User_Type;
     $user->email = $request->email;
     $user->password = bcrypt($request->password);
     $user->Bio = $request->Bio;
     $user->Location = $request->Location;
     $user->Image = $request->Image;
     $user->save();
     Auth::login($user);

     return response()->json($user, 200);
  }

  public function logout()
  {
      Auth::logout();
  }
}
