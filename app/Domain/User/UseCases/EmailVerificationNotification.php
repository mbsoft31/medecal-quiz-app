<?php

namespace App\Domain\User\UseCases;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmailVerificationNotification
{
    /**
     * Send a new email verification notification.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function handle(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return Redirect::intended(RouteServiceProvider::HOME);
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
