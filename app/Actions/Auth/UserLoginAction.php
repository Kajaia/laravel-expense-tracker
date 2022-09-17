<?php

namespace App\Actions\Auth;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserLoginAction
{
    public function __construct(
        protected User $model
    ) {}

    public function __invoke(LoginRequest $request): RedirectResponse
    {
        $user = $request->validate($request->rules());

        if(Auth::attempt($user, $request->boolean('remember')))
        {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Wrong credentials provided.'
        ])->onlyInput('email');
    }
}