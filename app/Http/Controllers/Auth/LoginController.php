<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function __construct(
        protected AuthService $authService
    ) {}

    public function __invoke(LoginRequest $request): RedirectResponse
    {
        return $this->authService->login($request);
    }
}
