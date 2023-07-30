<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function getUser()
    {
        $user = auth()->user();
        return response()->json(['success' => true, 'data' => $user]);
    }
    public function getAllUsers()
    {
        $users = User::all();
        return response()->json(['success' => true, 'data' => $users], 200);
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
    public function getUsersById($userId)
    {
        $user = User::find($userId);
        if ($user == null) {
            return response()->json(['success' => false, 'message' => 'id not found'], 404);
        }
        return response()->json(['success' => true, 'message' => $user], 201);
    }
    public function updateRole(Request $request, $id)
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            return response()->json(['message' => 'No permission to update user roles'], 403);
        }

        $user = User::find($id);
        $user->role = $request->input('role');
        $user->save();

        return response()->json(['success' => true, 'message' => 'User role updated successfully.', 'data' => $user], 200);
    }

    public function searchUsers(Request $request)
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            return response()->json(['message' => 'No permission to search user'], 403);
        }
        $email = $request->input('email');
        $users = User::where('email', 'like', '%' . $email . '%')->paginate(10);
        return response()->json(['success' => true, 'data' => $users]);
    }
}
