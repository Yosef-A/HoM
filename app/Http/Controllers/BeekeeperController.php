<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeekeeperController extends Controller
{
    public function index()
    {
       return view('beekeeper.index');
    }
}
