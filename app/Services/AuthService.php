<?php

namespace App\Services;

use App\Actions\Auth\UserRegisterAction;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\RedirectResponse;

class AuthService
{
    public function __construct(
        protected UserRegisterAction $userRegisterAction 
    ) {}

    public function register(RegisterRequest $request): RedirectResponse
    {
        return ($this->userRegisterAction)($request);
    }
}