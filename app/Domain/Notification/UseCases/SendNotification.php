<?php

namespace App\Domain\Notification\UseCases;

use App\Domain\Notification\Models\Notification;
use App\Domain\Notification\Services\NotificationService;

class SendNotification
{
    private NotificationService $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function execute(array $data): Notification
    {
        return $this->notificationService->sendNotification($data);
    }
}
