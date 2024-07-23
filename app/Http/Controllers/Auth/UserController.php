<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function showUser(Request $request)
    {
        if ($request->user()) {
            $data = $request->user();
            return response()->json($data, 200);
        } else {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
    }
    function registerUser(Request $request)
    {
        $validator = Validator::make($request->except('_token'), [
            'username' => 'required|string|min:3|regex:/^[\S]*[a-zA-Z]+[\S]*$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $data = new User();
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();
        return response()->json($data);
    }
    function login(Request $request)
    {
        $data = $request;

        $user = User::where('username', $data['username'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                'message' => 'hayoooo looo..?'
            ], 401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;

        $cookie = cookie('token', $token);

        return response()->json([
            'Message' => 'Berhasil login',
            'TOKEN' => $token
        ])->withCookie($cookie);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        $cookie = cookie()->forget('token');

        return response()->json([
            'message' => 'Logged out successfully!'
        ])->withCookie($cookie);
    }
}
