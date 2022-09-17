<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;

class LogoutController extends Controller
{
    public function __construct(
        protected AuthService $authService
    ) {}

    public function __invoke(): RedirectResponse
    {
        return $this->authService->logout();
    }
}
