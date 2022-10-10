<?php

use App\Http\Controllers\Api\CidadeController;
use App\Http\Controllers\Api\EstadoController;
use App\Http\Controllers\API\RegisterController;
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

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->middleware('auth:sanctum')->group(function(){

    Route::namespace('estado.')->group(function(){

        Route::get('estado/{id}/cidades', [EstadoController::class, 'cidade'])->name('cidade');
        Route::get('estado/', [EstadoController::class, 'index'])->name('index');
        Route::get('estado/{id}', [EstadoController::class, 'show'])->name('show');
        Route::post('estado/', [EstadoController::class, 'store'])->name('store');
        Route::put('estado/{id}', [EstadoController::class, 'update'])->name('update');
        Route::delete('estado/{id}', [EstadoController::class, 'delete'])->name('delete');
    });

    Route::namespace('cidade.')->group(function(){

        Route::get('cidade/', [CidadeController::class, 'index'])->name('index');
        Route::get('cidade/{id}', [CidadeController::class, 'show'])->name('show');
        Route::post('cidade/', [CidadeController::class, 'store'])->name('store');
        Route::put('cidade/{id}', [CidadeController::class, 'update'])->name('update');
        Route::delete('cidade/{id}', [CidadeController::class, 'delete'])->name('delete');
    });

});


