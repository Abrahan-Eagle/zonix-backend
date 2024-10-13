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

    // **Gestión de Perfiles**
    Route::prefix('profiles')->group(function () {
        Route::get('/', [ProfileController::class, 'index']);  // Listar perfiles
        Route::post('/', [ProfileController::class, 'store']);  // Crear perfil
        Route::get('/{id}', [ProfileController::class, 'show']);  // Ver perfil específico
        Route::put('/{id}', [ProfileController::class, 'update']);  // Actualizar perfil
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
        Route::put('/{id}', [GasTicketController::class, 'update']);
        Route::delete('/{id}', [GasTicketController::class, 'destroy']);
    });

    // **Cierre del ciclo por administrador**
    Route::post('/admin/close-cycle', [AdminController::class, 'closeCycle']);

    // **Gestión de Bombonas de Gas**
    Route::prefix('cylinders')->group(function () {
        Route::get('/', [GasCylinderController::class, 'index']);
        Route::post('/', [GasCylinderController::class, 'store']);
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










// // Rutas de autenticación
// Route::prefix('auth')->group(function () {
//     // Ruta para iniciar sesión con Google
//     Route::post('/google', [AuthController::class, 'googleUser']);

//     // Ruta para cerrar sesión (requiere autenticación con Sanctum)
//     Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

//     // Ruta para obtener información del usuario autenticado
//     Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'getUser']);
// });

// // Proteger rutas de la API que solo pueden ser accedidas por usuarios autenticados
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/protected-endpoint', function (Request $request) {
//         return response()->json([
//             'message' => 'Acceso autorizado',
//             'user' => $request->user(),
//         ]);
//     });

//     // Rutas para gestionar los tickets de gas
//     Route::prefix('tickets')->group(function () {
//         Route::get('/', [GasTicketController::class, 'index']);
//         Route::post('/', [GasTicketController::class, 'store']);
//         Route::get('/{id}', [GasTicketController::class, 'show']);
//         Route::put('/{id}', [GasTicketController::class, 'update']);
//         Route::delete('/{id}', [GasTicketController::class, 'destroy']);
//     });

//     // Ruta para el cierre de actividades por el administrador
//     Route::post('/admin/close-cycle', [AdminController::class, 'closeCycle']);

//     // Rutas para gestionar las bombonas de gas
//     Route::prefix('cylinders')->group(function () {
//         Route::get('/', [GasCylinderController::class, 'index']);
//         Route::post('/', [GasCylinderController::class, 'store']);
//         Route::get('/{id}', [GasCylinderController::class, 'show']);
//         Route::put('/{id}', [GasCylinderController::class, 'update']);
//         Route::delete('/{id}', [GasCylinderController::class, 'destroy']);
//     });

//     // Rutas para gestionar los teléfonos
//     Route::prefix('phones')->group(function () {
//         Route::get('/', [PhoneController::class, 'index']);
//         Route::post('/', [PhoneController::class, 'store']);
//         Route::get('/{id}', [PhoneController::class, 'show']);
//         Route::put('/{id}', [PhoneController::class, 'update']);
//         Route::delete('/{id}', [PhoneController::class, 'destroy']);
//     });

//     // Rutas para gestionar los correos electrónicos
//     Route::prefix('emails')->group(function () {
//         Route::get('/', [EmailController::class, 'index']);
//         Route::post('/', [EmailController::class, 'store']);
//         Route::get('/{id}', [EmailController::class, 'show']);
//         Route::put('/{id}', [EmailController::class, 'update']);
//         Route::delete('/{id}', [EmailController::class, 'destroy']);
//     });

//     // Rutas para gestionar las direcciones
//     Route::prefix('addresses')->group(function () {
//         Route::get('/', [AddressController::class, 'index']);
//         Route::post('/', [AddressController::class, 'store']);
//         Route::get('/{id}', [AddressController::class, 'show']);
//         Route::put('/{id}', [AddressController::class, 'update']);
//         Route::delete('/{id}', [AddressController::class, 'destroy']);
//     });

//     // Rutas para gestionar asociaciones vecinales
//     Route::prefix('neighborhood-associations')->group(function () {
//         Route::get('/', [NeighborhoodAssociationController::class, 'index']);
//         Route::post('/', [NeighborhoodAssociationController::class, 'store']);
//         Route::get('/{id}', [NeighborhoodAssociationController::class, 'show']);
//         Route::put('/{id}', [NeighborhoodAssociationController::class, 'update']);
//         Route::delete('/{id}', [NeighborhoodAssociationController::class, 'destroy']);
//     });
// });









// // Ruta para cerrar sesión
// Route::middleware('auth:sanctum')->post('/auth/logout', [AuthController::class, 'logout']);

// // Ruta para obtener información del usuario autenticado
// Route::middleware('auth:sanctum')->get('/auth/user', [AuthController::class, 'getAuthUser']);


// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Authenticator\AuthController;

// // Ruta pública para autenticación con Google
// Route::post('/auth/google', [AuthController::class, 'googleUser']);


// Route::middleware(['auth:api'])->group(function () {
//     Route::get('/user', [AuthController::class, 'getAuthUser']);
//     Route::post('/logout', [AuthController::class, 'logout']);
// });




// use App\Http\Controllers\NoteController;
// use App\Http\Controllers\Store\PostsController;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\UserController;

// // Public routes
// Route::post('/auth/register', [AuthController::class, 'createUser']);
// Route::post('/auth/login', [AuthController::class, 'loginUser']);
// // Google authentication
// Route::post('/auth/googleUser', [AuthController::class, 'googleUser']);
// // Articles
// Route::get('/post', [PostsController::class, 'index'])->name('posts.index');

// // Protected routes
// Route::middleware('auth:sanctum')->group(function () {
//     Route::post('/auth/users', [UserController::class, 'getAuthenticatedUser'])->name('users.getAuthenticatedUser');
//     Route::post('/auth/logout', [AuthController::class, 'logoutUser']);

//     // Notes
//     Route::get('/note', [NoteController::class, 'index'])->name('notes.index');
//     Route::get('/note/show/{id}', [NoteController::class, 'show'])->name('notes.show');
//     Route::post('/note/store', [NoteController::class, 'store'])->name('notes.store');
//     Route::put('/note/{id}', [NoteController::class, 'update'])->name('notes.update');
//     Route::delete('/note/{id}', [NoteController::class, 'destroy'])->name('notes.delete');
// });




