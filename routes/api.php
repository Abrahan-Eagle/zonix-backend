<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authenticator\AuthController;
use App\Http\Controllers\GasTicket\AdminController;
use App\Http\Controllers\GasTicket\GasCylinderController;
use App\Http\Controllers\GasTicket\GasTicketController;

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

// GAS TICKET
Route::middleware('auth:sanctum')->group(function () {
    // Rutas para gestionar los tickets de gas
    Route::get('/tickets', [GasTicketController::class, 'index']);
    Route::post('/tickets', [GasTicketController::class, 'store']);
    Route::get('/tickets/{id}', [GasTicketController::class, 'show']);
    Route::put('/tickets/{id}', [GasTicketController::class, 'update']);
    Route::delete('/tickets/{id}', [GasTicketController::class, 'destroy']);

    // Ruta para el cierre de actividades por el administrador
    Route::post('/admin/close-cycle', [AdminController::class, 'closeCycle']);

    // Rutas para gestionar las bombonas de gas
    Route::get('/cylinders', [GasCylinderController::class, 'index']);
    Route::post('/cylinders', [GasCylinderController::class, 'store']);
    Route::get('/cylinders/{id}', [GasCylinderController::class, 'show']);
    Route::put('/cylinders/{id}', [GasCylinderController::class, 'update']);
    Route::delete('/cylinders/{id}', [GasCylinderController::class, 'destroy']);
});





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




