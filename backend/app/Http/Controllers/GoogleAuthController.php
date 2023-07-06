<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function googleLogin(Request $credential)
    {
        try {
            $googleUser = $credential;
            $user = User::where('email', $googleUser['email'])->first();
            if ($user === null) {
                $newUser = User::create([
                    'firstname' => $googleUser['given_name'],
                    'lastname' => $googleUser['family_name'],
                    'email' => $googleUser['email'],
                    'profile_picture' => $googleUser['picture'],
                    'google_id' => $googleUser['sub'],
                ]);
                Auth::login($newUser);
                $token = $newUser->createToken('token-name', ['post', 'get', 'update', 'delete'])->plainTextToken;
                return response()->json([
                    'success' => true,
                    'message' => 'register successfully',
                    'token' => $token,
                    'user' => $newUser,
                ], 200);
            } else {
                Auth::login($user);
                $token = $user->createToken('token-name', ['post', 'get', 'update', 'delete'])->plainTextToken;
                return response()->json([
                    'success' => true,
                    'message' => 'login successfully',
                    'token' => $token,
                    'user' => $user,
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'something wrong',
            ], 503);
        }
    }
}