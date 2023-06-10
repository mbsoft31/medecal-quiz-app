<?php

namespace App\Domain\Notification\Repositories;

use App\Domain\Notification\Models\Notification;

interface NotificationRepositoryInterface
{
    public function findById(int $id): ?Notification;

    public function save(Notification $notification): Notification;

    public function delete(Notification $notification): bool;
}
