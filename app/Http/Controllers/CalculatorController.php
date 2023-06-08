<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CalculatorController;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }
    
    public function calculate(Request $request)
    {
        $length = $request->input('length');
        $width = $request->input('width');
        $height = $request->input('height');
        
        $volumetricWeightKg = ($length * $width * $height) / 5000;
        $volumetricWeightLbs = ($length * $width * $height) / 166;
        
        return response()->json([
            'volumetric_weight_kg' => $volumetricWeightKg,
            'volumetric_weight_lbs' => $volumetricWeightLbs,
        ]);
    }
}
