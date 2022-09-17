<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function __construct(
        protected AuthService $authService
    ) {}

    public function __invoke(RegisterRequest $request): RedirectResponse
    {
        return $this->authService->register($request);
    }
}
