<?php

namespace App\Actions\Auth;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ApiLoginAction
{
    public function __construct(
        protected User $model
    ) {}

    public function __invoke(LoginRequest $request): array
    {
        $request->validate($request->rules());

        $user = $this->model->where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($request->ip())->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }
}