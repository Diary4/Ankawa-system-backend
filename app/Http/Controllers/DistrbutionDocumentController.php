<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DistrbutionDocument;
use Illuminate\Support\Facades\Auth;

class DistrbutionDocumentController extends Controller
{
    public function index()
    {
        // Logic to display all distribution documents
        $data = DistrbutionDocument::where('user_id', Auth::id())->get();
        return response()->json($data);
    }

    public function show($id)
    {
        // Logic to display a specific distribution document
        $document = DistrbutionDocument::with(['user'])->findOrFail($id);
        return response()->json($document);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'the_late_name' => 'required|string',
            'farmanga' => 'required|string',
            'date_of_death' => 'required|date',
            'location' => 'required|string',
            'demander' => 'nullable|string',
            'page' => 'required|string',
            'record' => 'required|string',
            'judge' => 'nullable|string',
            'phone' => 'nullable|string',
            'witness1_name' => 'nullable|string',
            'witness2_name' => 'nullable|string',
            'details' => 'nullable|string',
        ]);

        $document = DistrbutionDocument::create([
            'user_id' => 1, // Assuming the user is authenticated
            ...$validated,
        ]);

        return response()->json($document, 201);
    }

    public function update(Request $request, $id)
    {
        $document = DistrbutionDocument::findOrFail($id);

        $validated = $request->validate([
            'the_late_name' => 'required|string',
            'farmanga' => 'required|string',
            'date_of_death' => 'required|date',
            'location' => 'required|string',
            'demander' => 'nullable|string',
            'page' => 'required|string',
            'record' => 'required|string',
            'judge' => 'nullable|string',
            'phone' => 'nullable|string',
            'witness1_name' => 'nullable|string',
            'witness2_name' => 'nullable|string',
            'details' => 'nullable|string',
        ]);

        $document->update($validated);

        return response()->json($document);
    }
}
