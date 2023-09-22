<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Pet;
use App\Http\Controllers\Driver;
use App\Http\Controllers\Auth;

Route::post('/auth', [Auth::class, 'auth']);

Route::get('/driver', [Driver::class, 'index']);
Route::post('/driver', [Driver::class, 'store']);

Route::get('/pet', [Pet::class, 'index']);
Route::get('/pet/{id}', [Pet::class, 'show']);
Route::put('/pet/{id}', [Pet::class, 'update']);
Route::post('/pet', [Pet::class, 'store']);
Route::delete('/pet/{id}', [Pet::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
