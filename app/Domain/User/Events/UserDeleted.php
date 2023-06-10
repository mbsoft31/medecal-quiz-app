<?php

namespace App\Domain\User\Events;

use App\Domain\User\Models\User;

class UserDeleted
{
    public User $user;

    /**
     * Create a new event instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
