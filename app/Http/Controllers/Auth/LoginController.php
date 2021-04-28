<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Get a JWT via given credentials.
     *
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ], [
            'required' => 'El campo :attribute es requerido.'
        ]);

        $credentials = $request->only(['email', 'password']);
        
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Estas credenciales no coinciden con nuestros registros.'], 401);
        }

        $user = auth()->guard()->getLastAttempted();
        if (!$user->is_active) {
            return response()->json(['message' => 'Esta cuenta ya no es válida o está desactivada.'], 401);
        }

        return $this->respondWithToken($token);
    }
}
