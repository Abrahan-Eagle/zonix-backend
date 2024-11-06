<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authenticator\AuthController;
use App\Http\Controllers\GasTicket\AdminController;
use App\Http\Controllers\GasTicket\GasCylinderController;
use App\Http\Controllers\GasTicket\GasTicketController;
use App\Http\Controllers\Profiles\PhoneController; // Asegúrate de importar el controlador de Phones
use App\Http\Controllers\Profiles\EmailController; // Asegúrate de importar el controlador de Emails
use App\Http\Controllers\Profiles\AddressController; // Asegúrate de importar el controlador de Addresses
use App\Http\Controllers\Profiles\DocumentController;
use App\Http\Controllers\Profiles\NeighborhoodAssociationController; // Asegúrate de importar el controlador de Neighborhood Associations
use App\Http\Controllers\Profiles\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí se registran las rutas API para tu aplicación.
| Todas las rutas se asignan al middleware "api".
|
*/


// Rutas de autenticación
Route::prefix('auth')->group(function () {
    // Ruta para iniciar sesión con Google
    Route::post('/google', [AuthController::class, 'googleUser']);

    // Ruta para cerrar sesión (requiere autenticación con Sanctum)
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

    // Ruta para obtener información del usuario autenticado
    Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'getUser']);
});

// // **Rutas de autenticación**
// Route::prefix('auth')->group(function () {
//     Route::post('/google', [AuthController::class, 'googleUser']);  // Iniciar sesión con Google
//     Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);  // Cerrar sesión
//     Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'getUser']);  // Obtener usuario autenticado
// });

// **Rutas protegidas con Sanctum**
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/protected-endpoint', function (Request $request) {
        return response()->json(['message' => 'Acceso autorizado', 'user' => $request->user()]);
    });

     // **Gestión de completed_onboarding**
    Route::prefix('onboarding')->group(function () {
        Route::put('/{id}', [AuthController::class, 'update']);  // Actualizar perfil
    });

    // **Gestión de Perfiles**
    Route::prefix('profiles')->group(function () {
        Route::get('/', [ProfileController::class, 'index']);  // Listar perfiles
        Route::post('/', [ProfileController::class, 'store']);  // Crear perfil
        Route::get('/{id}', [ProfileController::class, 'show']);  // Ver perfil específico
        Route::post('/{id}', [ProfileController::class, 'update']);  // Actualizar perfil
        Route::delete('/{id}', [ProfileController::class, 'destroy']);  // Eliminar perfil
    });


       // **Gestión de Documents**
    Route::prefix('documents')->group(function () {
        Route::get('/', [DocumentController::class, 'index']);  // Listar perfiles
        Route::post('/', [DocumentController::class, 'store']);  // Crear perfil
        Route::get('/{id}', [DocumentController::class, 'show']);  // Ver perfil específico
        Route::put('/{id}', [DocumentController::class, 'update']);  // Actualizar perfil
        Route::delete('/{id}', [DocumentController::class, 'destroy']);  // Eliminar perfil
    });



    // **Gestión de Tickets de Gas**
    Route::prefix('tickets')->group(function () {
        Route::get('/', [GasTicketController::class, 'index']);
        Route::post('/', [GasTicketController::class, 'store']);
        Route::get('/{id}', [GasTicketController::class, 'show']);
        Route::get('/getGasCylinders/{id}', [GasTicketController::class, 'getGasCylinders']);
        Route::put('/{id}', [GasTicketController::class, 'update']);
        Route::delete('/{id}', [GasTicketController::class, 'destroy']);
    });

    // **Cierre del ciclo por administrador**
    Route::post('/admin/close-cycle', [AdminController::class, 'closeCycle']);

    // **Gestión de Bombonas de Gas**
    Route::prefix('cylinders')->group(function () {
        Route::get('/', [GasCylinderController::class, 'index']);
        Route::post('/', [GasCylinderController::class, 'store']);
        Route::get('/getGasSuppliers', [GasCylinderController::class, 'getGasSuppliers']);
        Route::get('/{id}', [GasCylinderController::class, 'show']);
        Route::put('/{id}', [GasCylinderController::class, 'update']);
        Route::delete('/{id}', [GasCylinderController::class, 'destroy']);
    });


    // **Gestión de Teléfonos**
    Route::prefix('phones')->group(function () {
        Route::get('/', [PhoneController::class, 'index']);
        Route::post('/', [PhoneController::class, 'store']);
        Route::get('/{id}', [PhoneController::class, 'show']);
        Route::put('/{id}', [PhoneController::class, 'update']);
        Route::delete('/{id}', [PhoneController::class, 'destroy']);
    });

    // **Gestión de Correos Electrónicos**
    Route::prefix('emails')->group(function () {
        Route::get('/', [EmailController::class, 'index']);
        Route::post('/', [EmailController::class, 'store']);
        Route::get('/{id}', [EmailController::class, 'show']);
        Route::put('/{id}', [EmailController::class, 'update']);
        Route::delete('/{id}', [EmailController::class, 'destroy']);
    });

    // **Gestión de Direcciones**
    Route::prefix('addresses')->group(function () {
        Route::get('/', [AddressController::class, 'index']);
        Route::post('/', [AddressController::class, 'store']);
        Route::get('/{id}', [AddressController::class, 'show']);
        Route::put('/{id}', [AddressController::class, 'update']);
        Route::delete('/{id}', [AddressController::class, 'destroy']);
        Route::post('/getCountries', [AddressController::class, 'getCountries']);
        Route::post('/get-states-by-country', [AddressController::class, 'getState']);
        Route::post('/get-cities-by-state', [AddressController::class, 'getCity']);
    });

    // **Gestión de Asociaciones Vecinales**
    Route::prefix('neighborhood-associations')->group(function () {
        Route::get('/', [NeighborhoodAssociationController::class, 'index']);
        Route::post('/', [NeighborhoodAssociationController::class, 'store']);
        Route::get('/{id}', [NeighborhoodAssociationController::class, 'show']);
        Route::put('/{id}', [NeighborhoodAssociationController::class, 'update']);
        Route::delete('/{id}', [NeighborhoodAssociationController::class, 'destroy']);
    });

    // Route::middleware('auth:sanctum')->post('/profiles', [ProfileController::class, 'store']);
});

