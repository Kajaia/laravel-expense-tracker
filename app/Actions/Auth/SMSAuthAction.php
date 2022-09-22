<?php

namespace App\Actions\Auth;

use App\Http\Requests\VerificationCodeRequest;
use App\Models\User;
use App\Models\VerificationCode;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class SMSAuthAction
{
    public function __construct(
        protected User $model
    ) {}

    public function __invoke(VerificationCodeRequest $request): JsonResponse
    {
        // Validate request
        $request->validate($request->rules());

        // Get user by phone number
        $user = $this->model->where('phone', $request->phone)->first();

        // If not user return error
        if(!$user) { 
            return response()->json(['message' => 'No user with this phone.'], 401);
        }

        // Get latest verification code by phone number
        $code = VerificationCode::where([
            'phone' => $user->phone,
            'code' => $request->code,
        ])
            ->where('created_at', '>=', Carbon::now()->subMinutes(2))
            ->orderBy('created_at', 'desc')
            ->first();

        // Check if verification code exists and user can authenticate
        if($code) { 
            return [
                'user' => $user,
                'token' => $user->createToken($request->ip())->plainTextToken
            ]; 
        }

        // If no code retun Wrong verification code message
        return response()->json(['message' => 'Wrong verification code provided.'], 401);
    }
}