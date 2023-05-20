<?php

use App\Http\Controllers\api\v1\JobController;
use App\Http\Controllers\api\v1\StepController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// api/v1
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\api\v1'], function() {
    Route::resource('jobs', JobController::class);
    Route::resource('steps', StepController::class);
    Route::resource('hazards', HazardController::class);
    Route::resource('safeguards', SafeGuardController::class);
});
