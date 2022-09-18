<?php

namespace App\Actions\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

class ApiRegisterAction
{
    public function __construct(
        protected User $model
    ) {}

    public function __invoke(RegisterRequest $request): array
    {
        $request->validate($request->rules());

        $user = $this->model->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken($request->ip())->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }
}