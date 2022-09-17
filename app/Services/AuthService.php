<?php

namespace App\Services;

use App\Actions\Auth\UserLoginAction;
use App\Actions\Auth\UserRegisterAction;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\RedirectResponse;

class AuthService
{
    public function __construct(
        protected UserRegisterAction $userRegisterAction,
        protected UserLoginAction $userLoginAction
    ) {}

    public function register(RegisterRequest $request): RedirectResponse
    {
        return ($this->userRegisterAction)($request);
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        return ($this->userLoginAction)($request);
    }
}