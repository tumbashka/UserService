<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return UserResource::collection($users);
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        return UserResource::make($user);
    }

    public function show(User $user)
    {
        return UserResource::make($user);
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        $user->update($request->validated());

        return UserResource::make($user);
    }

    public function destroy(User $user)
    {
        $res = $user->delete();

        return response()->json([
            'result' => $res ? 'success' : 'error',
        ]);
    }

    public function check(int $userId)
    {
        $result = User::where('id', $userId)->exists();

        return response()->json(
            compact('result'),
        );
    }
}
