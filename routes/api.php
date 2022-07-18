<?php

use App\Http\Controllers\API\costumerLoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::post('/login', [ApiController::class, 'login']);
Route::post('/register', [ApiController::class, 'register']);
Route::post('/showObat', [ApiController::class, 'showObat']);
Route::post('/transaction', [ApiController::class, 'makeTransaction']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
