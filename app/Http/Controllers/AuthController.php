<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = $request->user();
            $token = $user->createToken('authToken')->plainTextToken;
            $role = $user->role->name;
            return response()->json(['token' => $token, 'role' => $role]);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
