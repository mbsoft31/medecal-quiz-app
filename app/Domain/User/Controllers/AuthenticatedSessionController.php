<?php

namespace App\Domain\User\Controllers;

use App\Domain\User\UseCases\LoginUser;
use App\Domain\User\UseCases\LogoutUser;
use App\Http\Controllers\Controller;
use App\Domain\User\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(LoginUser $loginUser): Response
    {
        return $loginUser->view();
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request, LoginUser $loginUser): RedirectResponse
    {
        $loginUser->handle($request);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request, LogoutUser $logoutUser): RedirectResponse
    {
        $logoutUser->handle($request);

        return redirect('/');
    }
}
