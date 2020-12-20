<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beekeepers_Hive;

class InvesterController extends Controller
{
    public function index()
    {
       return view('investor.index');
    }
    public function get_Hives(Request $req){
        //checking if the bee keeper as any hives in this table -- beekeepers_hive
        return Beekeepers_Hive::all(where('Beekeeper_Id', $req -> id));
    }
}
