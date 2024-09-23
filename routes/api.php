<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use Crm\User\Controllers\UserController;
use Crm\Project\Controllers\ProjectController;
use Crm\Customer\Controllers\CustomersController;

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

Route::middleware('auth:sanctum')->post('/user', function (Request $request) {
    return $request->user();
});

route::middleware(['auth:sanctum','Request-Id'])->group(function(){
    route::get("/index",[CustomersController::class,"index"]);
    route::get("/show/{id}",[CustomersController::class,"show"]);
    route::get("/create",[CustomersController::class,"create"]);
    route::PUT("/update/{id}",[CustomersController::class,"update"]);
    route::delete("/destroy/{id}",[CustomersController::class,"destroy"]);
    route::get("/export",[CustomersController::class,"export"]);
});



route::middleware('auth:sanctum')->group(function(){
    route::get("Customer/{customer_id}/note",[NoteController::class,"show"]);
    route::post("Customer/{customer_id}/note",[NoteController::class,"create"]);
    route::PUT("Customer/{customer_id}/note/{id}",[NoteController::class,"update"]);
    route::delete("Customer/{customer_id}/note/{id}",[NoteController::class,"destroy"]);
});
Route::middleware(['auth:sanctum','Request-Id'])->group(function (){
    Route::post("create-project/{customer_id}",[ProjectController::class,"createproject"]);
});
Route::middleware('Request-Id')->group(function (){
    Route::post("create-user",[UserController::class,"create"]);
});

