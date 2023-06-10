<?php

namespace App\Domain\User;

use App\Domain\User\Repositories\EloquentUserRepository;
use App\Domain\User\Repositories\UserRepositoryInterface;

class UserServiceProvider extends \Illuminate\Support\ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
    }

}
