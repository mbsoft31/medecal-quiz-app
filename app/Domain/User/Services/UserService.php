<?php

namespace App\Domain\User\Services;

use App\Domain\User\Models\User;
use App\Domain\User\Repositories\UserRepositoryInterface;
use App\Domain\User\Events\UserRegistered;
use App\Domain\User\Events\UserLoggedIn;
use App\Domain\User\Events\UserDeleted;
use Illuminate\Support\Facades\Auth;

class UserService
{
    private UserRepositoryInterface $userRepository;

    /**
     * UserService constructor.
     *
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Register a new user.
     *
     * @param array $data
     * @return User
     */
    public function registerUser(array $data): User
    {
        $user = new User($data);
        $this->userRepository->save($user);

        event(new UserRegistered($user));

        return $user;
    }

    /**
     * Log in a user.
     *
     * @param string $email
     * @param string $password
     * @return User|null
     */
    public function loginUser(string $email, string $password): ?User
    {
        $user = $this->userRepository->findByEmail($email);

        if (!$user || !password_verify($password, $user->password)) {
            return null;
        }

        event(new UserLoggedIn($user));

        return $user;
    }

    /**
     * Log out a user.
     */
    public function logoutUser(): bool
    {
        Auth::guard('web')->logout();

        session()->invalidate();

        session()->regenerateToken();

        return true;
    }

    /**
     * Delete a user.
     *
     * @param User $user
     * @return bool
     */
    public function deleteUser(User $user): bool
    {
        $result = $this->userRepository->delete($user);

        event(new UserDeleted($user));

        return $result;
    }
}
