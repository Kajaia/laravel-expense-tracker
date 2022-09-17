<?php

namespace App\Actions\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserRegisterAction
{
    public function __construct(
        protected User $model
    ) {}

    public function __invoke(RegisterRequest $request): RedirectResponse
    {
        $request->validate($request->rules());

        $user = $this->model->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        auth()->login($user);

        return redirect()->route('home');
    }
}