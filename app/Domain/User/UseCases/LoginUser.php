<?php

namespace App\Domain\User\UseCases;

use App\Domain\User\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class LoginUser
{
    /**
     * Authenticate the user with the given credentials.
     *
     * @param LoginRequest $request
     * @return bool
     */
    public function handle(LoginRequest $request): bool
    {
        $authenticated = $request->authenticate();

        $request->session()->regenerate();

        return $authenticated;
    }

    public function __invoke(LoginRequest $request): bool
    {
        return $this->handle($request);
    }

    public function view(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }
}
