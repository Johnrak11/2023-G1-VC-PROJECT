<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function register(StoreRegisterRequest $request)
    {
        // return $request;
        $register = User::registers($request);
        $token = $register->createToken('API Token', ['select', 'create', 'delete', 'update'])->plainTextToken;
        return response()->json(['success' => true, 'massage' => 'Register successful', 'user' => $register, 'token' => $token], 200);
    }

    public function login(LoginRequest $request)
    {
        $credentials = User::logins($request);
        $userExist = User::where('email', $credentials['email'])->first();
        if ($userExist === null) {
            return response()->json([
                'success' => false,
                'message' => ["email" => "Email doesn't exist"]
            ], 200);
        }
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('API Token', ['select', 'create', 'delete', 'update'])->plainTextToken;
            return response()->json([
                'success' => true,
                'message' => 'login successfully',
                'user' => $user,
                'token' => $token
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => ['password' => 'Incorrect password']
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
