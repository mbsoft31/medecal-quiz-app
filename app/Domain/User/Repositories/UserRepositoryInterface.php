<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Models\User;

interface UserRepositoryInterface
{
    /**
     * Find a user by ID.
     *
     * @param int $id
     * @return User|null
     */
    public function findById(int $id): ?User;

    /**
     * Find a user by email.
     *
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User;

    /**
     * Save the user to the database.
     *
     * @param User $user
     * @return User
     */
    public function save(User $user): User;

    /**
     * Delete the user from the database.
     *
     * @param User $user
     * @return bool
     */
    public function delete(User $user): bool;
}
