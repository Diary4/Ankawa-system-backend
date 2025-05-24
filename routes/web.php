<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarriageContractController;
use App\Models\MarriageContract;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/api/marriage-contracts', [MarriageContractController::class, 'index']);
Route::post('/api/marriage-contracts', [MarriageContractController::class, 'store']);