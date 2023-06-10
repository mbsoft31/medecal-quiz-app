<?php

namespace App\Domain\Notification\Services;

use App\Domain\Notification\Models\Notification;
use App\Domain\Notification\Repositories\NotificationRepositoryInterface;
use App\Domain\Notification\Events\NotificationSent;
use App\Domain\Notification\Events\NotificationRead;

class NotificationService
{
    private $notificationRepository;

    public function __construct(NotificationRepositoryInterface $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    public function sendNotification(array $data): Notification
    {
        $notification = new Notification($data);
        $this->notificationRepository->save($notification);

        event(new NotificationSent($notification));

        return $notification;
    }

    public function markNotificationAsRead(Notification $notification): Notification
    {
        $notification->read_at = now();
        $this->notificationRepository->save($notification);

        event(new NotificationRead($notification));

        return $notification;
    }
}
