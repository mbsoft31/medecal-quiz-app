<?php

namespace App\Domain\Notification\Repositories;

use App\Domain\Notification\Models\Notification;

class EloquentNotificationRepository implements NotificationRepositoryInterface
{
    public function findById(int $id): ?Notification
    {
        return Notification::find($id);
    }

    public function save(Notification $notification): Notification
    {
        $notification->save();
        return $notification;
    }

    public function delete(Notification $notification): bool
    {
        return $notification->delete();
    }
}
