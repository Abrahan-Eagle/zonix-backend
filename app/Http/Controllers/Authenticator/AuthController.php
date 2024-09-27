<?php

namespace App\Http\Controllers\Authenticator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function googleUser(Request $request)
    {
        // Validación de los datos de entrada
        $validatedData = $request->validate([
            'token' => 'required|string',
            'data' => 'required|array',
            'data.sub' => 'required|string',
            'data.name' => 'required|string',
            'data.given_name' => 'nullable|string',
            'data.family_name' => 'nullable|string',
            'data.picture' => 'nullable|url',
            'data.email' => 'required|email',
            'data.email_verified' => 'required|boolean',
        ]);

        try {
            // Extraer los datos del JSON
            $data = $validatedData['data'];
            $googleId = $data['sub'];
            $email = $data['email'];

            // Buscar o crear el usuario
            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $data['name'],
                    'google_id' => $googleId,
                    'given_name' => $data['given_name'],
                    'family_name' => $data['family_name'],
                    'profile_pic' => $data['picture'],
                ]
            );

            // Crear el token Sanctum
            $token = $user->createToken('GoogleToken')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'User authenticated successfully',
                'token' => $token,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role,
                    'profile_pic' => $user->profile_pic
                ]
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        // Invalidar todos los tokens del usuario
        $request->user()->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'User logged out successfully'
        ]);
    }

    public function getUser(Request $request)
    {
        $user = $request->user();
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role
        ]);
    }













































    // public function googleUser(Request $request)
    // {
    //     // Validación de los datos de entrada
    //     $validatedData = $request->validate([
    //         'token' => 'required|string',
    //         'data' => 'required|array',
    //         'data.sub' => 'required|string',
    //         'data.name' => 'required|string',
    //         'data.given_name' => 'nullable|string',
    //         'data.family_name' => 'nullable|string',
    //         'data.picture' => 'nullable|url',
    //         'data.email' => 'required|email',
    //         'data.email_verified' => 'required|boolean',
    //     ]);

    //     try {
    //         // Extraer los datos del JSON
    //         $data = $validatedData['data'];
    //         $googleId = $data['sub'];
    //         $email = $data['email'];

    //         // Buscar o crear el usuario
    //         $user = User::firstOrCreate(
    //             ['email' => $email],
    //             [
    //                 'name' => $data['name'],
    //                 'google_id' => $googleId,
    //                 'given_name' => $data['given_name'],
    //                 'family_name' => $data['family_name'],
    //                 'profile_pic' => $data['picture'],
    //                 // Considera agregar 'password' => null si es necesario
    //             ]
    //         );

    //         // Crear el token Sanctum
    //         $token = $user->createToken('GoogleToken')->plainTextToken;

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'User authenticated successfully',
    //             'token' => $token,
    //             'user' => $user
    //         ], 200);

    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => $th->getMessage()
    //         ], 500);
    //     }
    // }


    //     public function logout(Request $request)
    //     {
    //         // Invalidar todos los tokens del usuario
    //         $request->user()->tokens()->delete();

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'User logged out successfully'
    //         ]);
    //     }

    //     public function getUser(Request $request)
    //     {
    //         $user = $request->user();
    //         return response()->json([
    //             'id' => $user->id,
    //             'name' => $user->name,
    //             'email' => $user->email,
    //             'role' => $user->role // Obtener roles
    //         ]);
    //     }











        // return response()->json($request->all());



       // {
       //     return response()->json([
       //         'success' => true,
       //         'data' => $request->all(),
       //         'message' => 'Datos recibidos correctamente.',
       //     ], 200);

           // dd($request->all());

           // Validación de los datos de entrada
           // $validatedData = $request->validate([
           //     'email' => 'required|email',
           //     'google_id' => 'required|string',
           //     'name' => 'required|string',
           // ]);

           // try {
           //     // Buscar o crear el usuario
           //     $user = User::firstOrCreate(
           //         ['email' => $validatedData['email']],
           //         [
           //             'name' => $validatedData['name'],
           //             'google_id' => $validatedData['google_id'],
           //         ]
           //     );

           //     // Crear el token Sanctum
           //     $token = $user->createToken('Google Token')->plainTextToken;

           //     return response()->json([
           //         'status' => true,
           //         'message' => 'User authenticated successfully',
           //         'token' => $token,
           //         'user' => $user
           //     ], 200);
           // } catch (\Throwable $th) {
           //     return response()->json([
           //         'status' => false,
           //         'message' => $th->getMessage()
           //     ], 500);
           // }
    //    }

       // public function logout(Request $request)
       // {
       //     // Invalidar todos los tokens del usuario
       //     $request->user()->tokens()->delete();

       //     return response()->json([
       //         'status' => true,
       //         'message' => 'User logged out successfully'
       //     ]);
       // }

       // public function getAuthUser(Request $request)
       // {
       //     // Devolver los datos del usuario autenticado
       //     return response()->json([
       //         'status' => true,
       //         'user' => $request->user()
       //     ]);
       // }

}
