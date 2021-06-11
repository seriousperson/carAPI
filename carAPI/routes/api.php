<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Car;
use App\Models\Car;
use App\Http\Resources\CarResource;
use App\Http\Controllers\CarsController;

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


Route::middleware('auth:api')->get('/cars/all', [CarsController::class, 'index']);
Route::middleware('auth:api')->get('/cars/{params}', [CarsController::class, 'show']);
