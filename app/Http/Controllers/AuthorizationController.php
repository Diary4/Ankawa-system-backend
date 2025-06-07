<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authorization;

class AuthorizationController extends Controller
{
    
    public function index()
    {
        // Logic to display all authorizations
        $authorizations = Authorization::with(['user'])->get();
        return response()->json($authorizations);
    }

    public function show($id)
    {
        // Logic to display a specific authorization
        $authorization = Authorization::with(['user'])->findOrFail($id);
        return response()->json($authorization);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'demander' => 'required|string',
            'location' => 'required|string',
            'patient_name' => 'required|string',
            'disease_type' => 'required|string',
            'judge' => 'nullable|string',
            'phone' => 'nullable|string',
        ]);

        $authorization = Authorization::create([
            'user_id' => 1, // Assuming user_id is set to 1 for demonstration
            'demander' => $validated['demander'],
            'location' => $validated['location'],
            'patient_name' => $validated['patient_name'],
            'disease_type' => $validated['disease_type'],
            'judge' => $validated['judge'],
            'phone' => $validated['phone'] ?? 'Default Phone Number',
        ]);

        return response()->json($authorization, 201);
    }
}
