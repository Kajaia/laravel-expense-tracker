<?php

namespace App\Actions\Auth;

use App\Helpers\SMS;
use App\Http\Requests\SendCodeRequest;
use App\Models\VerificationCode;

class SendAuthCodeAction
{
    public function __construct(
        protected VerificationCode $model
    ) {}

    public function __invoke(SendCodeRequest $request): string
    {
        // Validate request
        $request->validate($request->rules());

        // Generate random 4 digits code
        $code = rand(1000, 9999);

        // Create record in database
        $this->model->create([
            'phone' => $request->phone,
            'code' => $code
        ]);

        // Send SMS and return success message
        return SMS::send($request->phone, $code);
    }
}