<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authorization;
use Illuminate\Support\Facades\Auth;

class AuthorizationController extends Controller
{
    
    public function index()
    {
        // Logic to display all authorizations
        $data = Authorization::where('user_id', Auth::id())->get();
        return response()->json($data);
    }

    public function show($id)
    {
        // Logic to display a specific authorization
        $item = Authorization::findOrFail($id);

        // Check if the logged-in user owns the item
        if ($item->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return response()->json($item);
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
            'user_id' => $request->user()->id, // Assuming user_id is set to 1 for demonstration
            'demander' => $validated['demander'],
            'location' => $validated['location'],
            'patient_name' => $validated['patient_name'],
            'disease_type' => $validated['disease_type'],
            'judge' => $validated['judge'],
            'phone' => $validated['phone'] ?? 'Default Phone Number',
        ]);

        return response()->json($authorization, 201);
    }

    public function update(Request $request, $id)
    {
        $authorization = Authorization::findOrFail($id);

        $validated = $request->validate([
            'demander' => 'required|string',
            'location' => 'required|string',
            'patient_name' => 'required|string',
            'disease_type' => 'required|string',
            'judge' => 'nullable|string',
            'phone' => 'nullable|string',
        ]);

        $authorization->update([
            'demander' => $validated['demander'],
            'location' => $validated['location'],
            'patient_name' => $validated['patient_name'],
            'disease_type' => $validated['disease_type'],
            'judge' => $validated['judge'],
            'phone' => $validated['phone'] ?? 'Default Phone Number',
        ]);

        return response()->json($authorization);
    }
}
