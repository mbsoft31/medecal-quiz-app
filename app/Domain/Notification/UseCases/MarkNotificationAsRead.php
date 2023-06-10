<?php

namespace App\Domain\Notification\UseCases;

use App\Domain\Notification\Models\Notification;
use App\Domain\Notification\Services\NotificationService;

class MarkNotificationAsRead
{
    private NotificationService $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function execute(Notification $notification): Notification
    {
        return $this->notificationService->markNotificationAsRead($notification);
    }
}
