<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return response()->json([
                'message' => 'Wrong email or password'
            ], 401);
        }

        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Login success',
            'token' => $request->user()->createToken('token')->plainTextToken
        ]);
    }

    public function register(StoreRequest $request)
    {
        return User::create($request->validated());
    }
}
