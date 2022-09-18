<?php

namespace App\Services;

use App\Actions\Auth\ApiLoginAction;
use App\Actions\Auth\ApiLogoutAction;
use App\Actions\Auth\ApiRegisterAction;
use App\Actions\Auth\UserLoginAction;
use App\Actions\Auth\UserLogoutAction;
use App\Actions\Auth\UserRegisterAction;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthService
{
    public function __construct(
        protected UserRegisterAction $userRegisterAction,
        protected UserLoginAction $userLoginAction,
        protected UserLogoutAction $userLogoutAction,
        protected ApiRegisterAction $apiRegisterAction,
        protected ApiLoginAction $apiLoginAction,
        protected ApiLogoutAction $apiLogoutAction
    ) {}

    public function register(RegisterRequest $request): RedirectResponse
    {
        return ($this->userRegisterAction)($request);
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        return ($this->userLoginAction)($request);
    }

    public function logout(): RedirectResponse
    {
        return ($this->userLogoutAction)();
    }

    public function apiRegister(RegisterRequest $request): array
    {
        return ($this->apiRegisterAction)($request);
    }

    public function apiLogin(LoginRequest $request): array
    {
        return ($this->apiLoginAction)($request);
    }

    public function apiLogout(Request $request): JsonResponse
    {
        return ($this->apiLogoutAction)($request);
    }
}