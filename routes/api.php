<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarriageContractController;
use App\Http\Controllers\DeathDocumentController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/csrf-token', function (Request $request) {
    return response()->json(['csrfToken' => csrf_token()]);
});


Route::get('/marriage-contracts', [MarriageContractController::class, 'index']);
Route::get('/marriage-contracts/{id}', [MarriageContractController::class, 'show']);
Route::post('/marriage-contracts', [MarriageContractController::class, 'store']);
Route::put('/marriage-contracts/{id}', [MarriageContractController::class, 'update']);

Route::get('death-documents', [DeathDocumentController::class, 'index']);
Route::get('death-documents/{id}', [DeathDocumentController::class, 'show']);
Route::post('death-documents', [DeathDocumentController::class, 'store']);


Route::get('/authorizations', [App\Http\Controllers\AuthorizationController::class, 'index']);
Route::get('/authorizations/{id}', [App\Http\Controllers\AuthorizationController::class, 'show']);
Route::post('/authorizations', [App\Http\Controllers\AuthorizationController::class, 'store']);