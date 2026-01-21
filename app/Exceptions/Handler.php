<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Maneja respuestas cuando el usuario no está autenticado.
     *
     * Para las rutas de API devolvemos siempre JSON 401 en lugar de
     * intentar redirigir a una ruta "login" (que no existe en este proyecto).
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        // Peticiones API o que esperan JSON
        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json([
                'message' => 'No autenticado.',
            ], 401);
        }

        // Peticiones web: redirige de forma segura a la raíz
        return redirect()->guest(url('/'));
    }
}
