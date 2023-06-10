<?php

namespace App\Domain\User\UseCases;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ConfirmPassword
{
    /**
     * Confirm the user's password.
     *
     * @param Request $request
     * @return bool
     * @throws ValidationException
     */
    public function handle(Request $request): bool
    {
        $user = $request->user();

        if (!Auth::guard('web')->validate([
            'email' => $user->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        return true;
    }
}
