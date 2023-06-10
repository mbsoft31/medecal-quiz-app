<?php

namespace App\Domain\User\UseCases;

use Illuminate\Support\Facades\Password;

class SendPasswordResetLink
{
    /**
     * Send password reset link to the given email.
     *
     * @param string $email
     * @return string|null
     */
    public function handle(string $email): ?string
    {
        $response = Password::sendResetLink(['email' => $email]);

        return $response === Password::RESET_LINK_SENT ? null : $response;
    }
}
