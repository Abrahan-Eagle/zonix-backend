<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authenticator\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí puedes registrar rutas API para tu aplicación.
| Estas rutas son cargadas por el RouteServiceProvider y se asignan al grupo middleware "api".
|
*/

Route::prefix('auth')->group(function () {
    // Ruta para iniciar sesión con Google
    Route::post('/google', [AuthController::class, 'googleUser']);

    // Ruta para cerrar sesión (requiere autenticación con Sanctum)
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

    // Ruta para obtener información del usuario autenticado
    Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'getUser']);
});

// Proteger otras rutas de la API que solo pueden ser accedidas por usuarios autenticados
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/protected-endpoint', function (Request $request) {
        return response()->json([
            'message' => 'Acceso autorizado',
            'user' => $request->user(),
        ]);
    });

    // Otras rutas protegidas pueden ir aquí...
});

