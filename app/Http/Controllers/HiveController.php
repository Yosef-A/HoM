<?php

namespace App\Http\Controllers;
use App\Models\Hive;
use App\Models\Beekeepers_Hive;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HiveController extends Controller
{
    public function index()
    {
          
    }
    public function store(Request $request)
    {
        $hive = new Hive();
        $hive->Annual_Production = $request->input('Annual_Production');
        $hive->Cost = $request->input('Cost');
        $hive->image = $request->input('image');
        $hive->save();
        $beekeepers_hive = new Beekeepers_Hive();
        $beekeepers_hive->Hive_Id = $hive->id;
        $beekeepers_hive->Beekeeper_Id = Auth::id();
        $beekeepers_hive->save();
      

    }
    public function show($id)
    {

    }
}
