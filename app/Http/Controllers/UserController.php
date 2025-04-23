<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Models\User;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(Request $request)
    {
        $user = $this->userService->createUser($request->all());
        return response()->json(['message' => 'User created successfully', 'user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $user = $this->userService->updateUser($user, $request->all());
        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }

    public function destroy(User $user)
    {
        $this->userService->deleteUser($user);
        return response()->json(['message' => 'User deleted successfully']);
    }
    public function dashboard()
    {
        return view('user.dashboard'); 
    }
}
