<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MarriageContract;

class MarriageContractController extends Controller
{
    
    public function index()
    {
        // Logic to display all marriage contracts
        $contracts = MarriageContract::with(['groom', 'bride'])->get();
        return response()->json($contracts);
    }
}
