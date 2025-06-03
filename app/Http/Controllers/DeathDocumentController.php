<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeathContractModel;

class DeathDocumentController extends Controller
{
    
    public function index()
    {
        $documents = DeathContractModel::with(['user'])->get();
        return response()->json($documents);
    }

    public function show($id)
    {
        // Logic to display a specific death document
        $document = DeathContractModel::with(['user'])->findOrFail($id);
        return response()->json($document);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gender' => 'required|string',
            'death_location' => 'required|string',
            'date_of_death' => 'required|date',
            'religion' => 'required|string',
            'nationality' => 'required|string',
            'demander' => 'required|string',
            'location' => 'required|string',
            'related_to_death' => 'required|string',
            'judge' => 'nullable|string',
            'phone' => 'nullable|string',
            'witness1_name' => 'nullable|string',
            'witness2_name' => 'nullable|string',
        ]);

        $document = DeathContractModel::create([
            'user_id' => 1,
        ] + $validated);
        return response()->json($document, 201);
    }
}
