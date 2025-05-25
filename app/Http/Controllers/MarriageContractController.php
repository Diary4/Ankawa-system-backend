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
    public function show($id)
    {
        // Logic to display a specific marriage contract
        $contract = MarriageContract::with(['groom', 'bride'])->findOrFail($id);
        return response()->json($contract);
    }

    public function store(Request $request)
    {
         $validated = $request->validate([
            'type' => 'required|in:muslim,christian,daraki',
            'judge_name' => 'required|string',
            'phone' => 'required|string',
            'marriage_date' => 'required|date',
            'witness1_name' => 'nullable|string',
            'witness2_name' => 'nullable|string',
            'marray_peshaki' => 'nullable|string',
            'marray_pashaki' => 'nullable|string',
            'peshaki_wargirawa' => 'nullable|boolean',
            'pashaki_wargirawa' => 'nullable|boolean',
            'groom.name' => 'required|string',
            'groom.dob' => 'required|date',
            'groom.nationality' => 'required|string',
            'groom.occupation' => 'required|string',
            'groom.address' => 'required|string',
            'groom.religion' => 'required|string',
            'groom.marital_status' => 'required|string',
            'bride.name' => 'required|string',
            'bride.dob' => 'required|date',
            'bride.nationality' => 'required|string',
            'bride.occupation' => 'required|string',
            'bride.address' => 'required|string',
            'bride.religion' => 'required|string',
            'bride.marital_status' => 'required|string',
        ]);

        $contract = MarriageContract::create([
            'user_id' => 1,
            'type' => $validated['type'],
            'judge_name' => $validated['judge_name'],
            'phone' => $validated['phone'],
            'marriage_date' => $validated['marriage_date'],
            'witness1_name' => $request->input('witness1_name', 'Default Witness 1'), 
            'witness2_name' => $request->input('witness2_name', 'Default Witness 2'), 
            'marray_peshaki' => $request->input('marray_peshaki', 'Default 10msqal'),
            'marray_pashaki' => $request->input('marray_pashaki', 'Default 20msqal'),
            'peshaki_wargirawa' => $request->input('peshaki_wargirawa', false),
            'pashaki_wargirawa' => $request->input('pashaki_wargirawa', true),
        ]);

        $contract->groom()->create($validated['groom']);
        $contract->bride()->create($validated['bride']);

        return response()->json(['message' => 'Marriage contract created successfully']);
    }

}
