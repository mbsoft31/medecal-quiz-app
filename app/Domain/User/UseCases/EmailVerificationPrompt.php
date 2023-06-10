<?php

namespace App\Domain\User\UseCases;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class EmailVerificationPrompt
{
    /**
     * Display the email verification prompt.
     *
     * @param Request $request
     * @return Response|RedirectResponse
     */
    public function handle(Request $request): Response|RedirectResponse
    {
        return $request->user()->hasVerifiedEmail()
            ? Redirect::intended(RouteServiceProvider::HOME)
            : Inertia::render('Auth/VerifyEmail', ['status' => session('status')]);
    }
}
