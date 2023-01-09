<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/doctorordertype', [App\Http\Controllers\Api\DoctorOrderType\DoctorOrderTypeController::class, 'store']);
Route::delete('/doctorordertype/{id}', [App\Http\Controllers\Api\DoctorOrderType\DoctorOrderTypeController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
