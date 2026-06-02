<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user->api_token = Str::random(60);
        $user->save();

        return response()->json([
            'token' => $user->api_token,
            'user' => new UserResource($user),
        ]);
    }

    public function me(Request $request)
    {
        return response()->json([
            'user' => new UserResource($request->user('api')),
        ]);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:tabel_users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'sometimes|in:admin,user',
        ]);

        $role = 'user';

        if ($request->user('api') && $request->user('api')->role === 'admin' && ($data['role'] ?? 'user') === 'admin') {
            $role = 'admin';
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => $role,
            'api_token' => Str::random(60),
        ]);

        return response()->json([
            'token' => $user->api_token,
            'user' => new UserResource($user),
        ], 201);
    }

    public function logout(Request $request)
    {
        $user = $request->user('api');

        if ($user) {
            $user->api_token = null;
            $user->save();
        }

        return response()->json(['message' => 'Logged out successfully']);
    }
}
