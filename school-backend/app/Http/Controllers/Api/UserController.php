<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
class UserController extends Controller
{
    public function index()
    {
        return User::with('roles')->get();
    }

   public function store(StoreUserRequest $request)
{
    $validated = $request->validated();

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    $user->assignRole($validated['role']);

    return response()->json($user->load('roles'), 201);
}

    public function show($id)
    {
        return User::with('roles')->findOrFail($id);
    }

    public function update(UpdateUserRequest $request, $id)
{
    $user = User::findOrFail($id);
    $validated = $request->validated();

    $user->update([
        'name' => $validated['name'] ?? $user->name,
        'email' => $validated['email'] ?? $user->email,
        'password' => isset($validated['password']) ? bcrypt($validated['password']) : $user->password,
    ]);

    if (isset($validated['role'])) {
        $user->syncRoles([$validated['role']]);
    }

    return response()->json($user->load('roles'));
}

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted']);
    }
}
