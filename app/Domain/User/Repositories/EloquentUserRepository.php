<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Models\User;

class EloquentUserRepository implements UserRepositoryInterface
{
    /**
     * Find a user by ID.
     *
     * @param int $id
     * @return User|null
     */
    public function findById(int $id): ?User
    {
        return User::find($id);
    }

    /**
     * Find a user by email.
     *
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    /**
     * Save the user to the database.
     *
     * @param User $user
     * @return User
     */
    public function save(User $user): User
    {
        $user->save();
        return $user;
    }

    /**
     * Delete the user from the database.
     *
     * @param User $user
     * @return bool
     */
    public function delete(User $user): bool
    {
        return $user->delete();
    }
}
