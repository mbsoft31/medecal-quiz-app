<?php

namespace App\Domain\User\UseCases;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogoutUser
{
    /**
     * Logout the user.
     *
     * @param Request $request
     * @return void
     */
    public function handle(Request $request): void
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    }
}
