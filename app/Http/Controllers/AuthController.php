<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('regtoken')->plainTextToken;

        return response()->json(['data' => $user, 'access_token' => $token, 'token_type' => 'Bearer']);
    }



    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()
                ->json(['message' => 'Wrong credentials!', 'success'=>false], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('token')->plainTextToken;

        return response()
            ->json(['message' => 'Hello, ' . $user->name . ', welcome!', 'success'=>true, 'access_token' => $token, 'token_type' => 'Bearer']);
    }
    
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return [ 'success' => true  ];
    }
}
