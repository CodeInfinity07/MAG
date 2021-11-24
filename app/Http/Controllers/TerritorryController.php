<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Territory;

class TerritorryController extends Controller
{
    public function fetch(Request $request){
      return Territory::select('country')
        ->where('country', 'like', "%{$request->term}%")
        ->pluck('country');
    }
}
