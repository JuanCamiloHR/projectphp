<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;


// Si se es invitado, entonces permite visualizar el formulario (create), e iniciar sesión (store)
Route::middleware('guest')->group(function () {
 

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    
});

// Si se está autenticado, entonces se podría ejecutar la ruta de cierre de sesión
Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
