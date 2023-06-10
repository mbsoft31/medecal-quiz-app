<?php

namespace App\Domain\User\UseCases;

use App\Domain\User\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterUser
{
    /**
     * Register a new user.
     *
     * @param array $data
     * @return User|null
     */
    public function handle(array $data): ?User
    {
        // Create the user using the provided data
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        // Log in the newly registered user
        Auth::login($user);

        return $user;
    }
}
