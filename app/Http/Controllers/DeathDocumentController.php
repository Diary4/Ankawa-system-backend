<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeathDocument;

class DeathDocumentController extends Controller
{
    
    public function index()
    {
        $documents = DeathDocument::with(['user'])->get();
        return response()->json($documents);
    }

    public function show($id)
    {
        // Logic to display a specific death document
        $document = DeathDocument::with(['user'])->findOrFail($id);
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

        $document = DeathDocument::create([
            'user_id' => 1,
            'gender' => $validated['gender'],
            'death_location' => $validated['death_location'],
            'date_of_death' => $validated['date_of_death'],
            'religion' => $validated['religion'],
            'nationality' => $validated['nationality'],
            'demander' => $validated['demander'],
            'location' => $validated['location'],
            'related_to_death' => $validated['related_to_death'],
            'judge' => $validated['judge'],
            'phone' => $validated['phone'] ?? 'Default Phone Number',
            'witness1_name' => $validated['witness1_name'],
            'witness2_name' => $validated['witness2_name'],
        ]);
        return response()->json($document, 201);
    }
}
