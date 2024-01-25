<?php

namespace App\Http\Controllers;
use App\Models\truatm;
use Illuminate\Http\Request;

class TruATMController extends Controller
{
    public function getLocations() {
        $locations = truatm::all(); 
        return response()->json($locations);
    }
}
