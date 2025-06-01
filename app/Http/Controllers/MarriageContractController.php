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
            'kanisa' => 'nullable|string',
            'tayfa' => 'nullable|string',
            'number_of_childs' => 'nullable|integer',  
            'groom.name' => 'required|string',
            'groom.dob' => 'required|date',
            'groom.nationality' => 'required|string',
            'groom.occupation' => 'nullable|string',
            'groom.address' => 'nullable|string',
            'groom.religion' => 'required|string',
            'groom.marital_status' => 'nullable|string',
            'bride.name' => 'required|string',
            'bride.dob' => 'required|date',
            'bride.nationality' => 'required|string',
            'bride.occupation' => 'nullable|string',
            'bride.address' => 'nullable|string',
            'bride.religion' => 'required|string',
            'bride.marital_status' => 'nullable|string',
        ]);

        $contract = MarriageContract::create([
            'user_id' => 1,
            'type' => $validated['type'],
            'judge_name' => $validated['judge_name'],
            'phone' => $validated['phone'], // Default phone number if not provided
            'marriage_date' => $validated['marriage_date'],
            'witness1_name' => $request->input('witness1_name', 'Default Witness 1'), 
            'witness2_name' => $request->input('witness2_name', 'Default Witness 2'), 
            'marray_peshaki' => $request->input('marray_peshaki', 'Default 10msqal'),
            'marray_pashaki' => $request->input('marray_pashaki', 'Default 20msqal'),
            'peshaki_wargirawa' => $request->input('peshaki_wargirawa', false),
            'pashaki_wargirawa' => $request->input('pashaki_wargirawa', true),
            'kanisa' => $request->input('kanisa', 'Default Kanisa'),
            'tayfa' => $request->input('tayfa', 'Default Tayfa'),
            'number_of_childs' => $request->input('number_of_childs', 0), // Default to 0 if not provided
        ]);

        $contract->groom()->create($validated['groom']);
        $contract->bride()->create($validated['bride']);

        return response()->json(['message' => 'Marriage contract created successfully']);
    }

    public function update(Request $request, $id)
    {
        $contract = MarriageContract::findOrFail($id);

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
            'kanisa' => 'nullable|string',
            'tayfa' => 'nullable|string',
            'number_of_childs' => 'nullable|integer',  
        ]);

        $contract->update($validated);

        if ($request->has('groom')) {
            $contract->groom()->update($request->input('groom'));
        }

        if ($request->has('bride')) {
            $contract->bride()->update($request->input('bride'));
        }

        return response()->json(['message' => 'Marriage contract updated successfully']);
    }

}
