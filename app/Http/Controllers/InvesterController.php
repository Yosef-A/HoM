<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvesterController extends Controller
{
    public function index()
    {
       return view('investor.index');
    }
}
