<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BeekeeperController extends Controller
{
    public function index()
    {
       return User::latest()->get();
    }
    public function getBK(){
        return User::all();
    }
}
