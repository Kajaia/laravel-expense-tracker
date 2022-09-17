<?php

namespace App\Actions\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLogoutAction
{
    public function __construct(
        protected Request $request
    ) {}

    public function __invoke(): RedirectResponse
    {
        Auth::logout();

        $this->request->session()->invalidate();

        $this->request->session()->regenerateToken();

        return redirect()->route('login');
    }
}