<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/api/marriage-contracts', [App\Http\Controllers\MarriageContractController::class, 'index']);