<?php

use App\Http\Controllers\Api\EstadoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function(){

    Route::namespace('estado.')->group(function(){

        Route::get('estado/{id}/cidades', [EstadoController::class, 'cidade'])->name('cidade');

        Route::get('estado/', [EstadoController::class, 'index'])->name('index');
        Route::get('estado/{id}', [EstadoController::class, 'show'])->name('show');
        Route::post('estado/', [EstadoController::class, 'store'])->name('store');
        Route::put('estado/{id}', [EstadoController::class, 'update'])->name('update');
        Route::delete('estado/{id}', [EstadoController::class, 'delete'])->name('delete');

    });

});


