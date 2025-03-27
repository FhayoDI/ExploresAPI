<?php

use App\Http\Controllers\ExplorerController;
use App\Http\Controllers\HistoricController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MediumVallueController;
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
//parte do login
Route::post("/login", []);

//parte dos explorer
Route::post('/explorer',[ExplorerController::class,'store']);
Route::put('/explorer/{explorer}/update', [ExplorerController::class,'update']);
Route::get('/explorer/{explorer}',[ExplorerController::class,'show']);
Route::get('/explorer',[ExplorerController::class,'index']);
Route::get('/explorer/{explorer}/historico',[HistoricController ::class,'show']);
//parte dos item
Route::post('/item',[ItemController::class,'store']);
Route::get('/item',[ItemController::class,'index']);
Route::post('/item/trade',[ItemController::class,'trade']);
Route::get('/item/relatorios',[MediumVallueController::class,'show']);