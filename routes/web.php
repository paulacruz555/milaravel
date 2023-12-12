<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

route::get('/',[PagesController::class, 'fnIndex'])-> name('xInicio');
Route::post('/',[PagesController::class,'fnRegistrar'])->name('Estudiante.xRegistrar');

Route::get('/detalle{id}',[PagesController::class,'fnEstDetalle'])->name('Estudiante.xDetalle');
Route::get('/galeria/{numero?}', [PagesController::class, 'fnGaleria']) -> where('numero', '[0-9]+') -> name('xGaleria');
Route::get('/lista', [PagesController::class, 'fnLista']) -> name('xLista');


Route::get('/actualizar/{id}',[PagesController::class, 'fnEstActualizar'])-> name('Estudiante.xActualizar');
Route::put('/actualizar/{id}',[PagesController::class, 'fnUpdate'])-> name('Estudiante.xUpdate');

Route::delete('/eliminar/{id}', [PagesController::class, 'fnEliminar']) -> name('Estudiante.xEliminar');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
