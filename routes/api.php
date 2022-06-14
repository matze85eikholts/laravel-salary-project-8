<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\Manager\ClientEquipmentController;
use App\Http\Controllers\Manager\EmployeeController;
use App\Http\Controllers\Manager\EquipmentController;
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

//------adding new client-------------------------------
Route::namespace('Manager')->group(function(){
    Route::post('client/add',[ClientController::class,'store']);
    Route::get('clients',[ClientController::class,'index']);
    Route::get('client/{id}/show',[ClientController::class,'show']);
    Route::put('client/{id}/update',[ClientController::class,'update']);
    Route::delete('client/{id}/delete',[ClientController::class,'destroy']);
});
//--------CRUD equipment--------------------------------
Route::namespace('Manager')->group(function(){
    Route::post('equipment/add',[EquipmentController::class,'store']);
    Route::get('equipments',[EquipmentController::class,'index']);
    Route::get('equipment/{id}/show',[EquipmentController::class,'show']);
    Route::put('equipment/{id}/update',[EquipmentController::class,'update']);
    Route::delete('equipment/{id}/delete',[EquipmentController::class,'destroy']);
});
//-----equipment and client information -----------------------
Route::namespace('Manager')->group(function(){
    
    Route::get('clients/equipments',[ClientEquipmentController::class,'index']);
    Route::get('clients/equipments/{id}/show',[ClientEquipmentController::class,'show']);

});
//------employee CRUD-------------------------------
Route::namespace('Manager')->group(function(){
    
    Route::get('employees',[EmployeeController::class,'index']);
    //Route::get('clients/equipments/{id}/show',[ClientEquipmentController::class,'show']);

});
//Route::post('client/add',[EquipmentController::class,'store']);
/*Route::post('client/add',[ClientController::class,'store']);
Route::get('clients',[ClientController::class,'index']);
Route::get('client/{id}/show',[ClientController::class,'show']);
Route::put('client/{id}/update',[ClientController::class,'update']);
Route::delete('client/{id}/delete',[ClientController::class,'destroy']);*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
