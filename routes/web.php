<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarriageContractController;
use App\Models\MarriageContract;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});

    Route::post('/api/marriage-contracts', [MarriageContractController::class, 'store']);
    Route::get('/api/marriage-contracts', [MarriageContractController::class, 'index']);
    Route::get('/api/marriage-contracts/{id}', [MarriageContractController::class, 'show']);
    Route::put('/api/marriage-contracts/{id}', [MarriageContractController::class, 'update']);