<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Integration\IntegrationController;
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

Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login']);

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('/integration/list', [IntegrationController::class, 'list']);
    Route::post('/integration/store', [IntegrationController::class, 'store']);
    Route::put('/integration/update', [IntegrationController::class, 'update']);
    Route::delete('/integration/delete', [IntegrationController::class, 'delete']);
});
