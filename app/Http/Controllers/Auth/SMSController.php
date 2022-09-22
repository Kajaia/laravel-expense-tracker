<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendCodeRequest;
use App\Http\Requests\VerificationCodeRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;

class SMSController extends Controller
{
    public function __construct(
        protected AuthService $authService
    ) {}

    public function send(SendCodeRequest $request): string
    {
        return $this->authService->sendCode($request);
    }

    public function login(VerificationCodeRequest $request): JsonResponse
    {
        return $this->authService->smsAuth($request);
    }
}
