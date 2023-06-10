<?php

namespace App\Domain\Notification\Events;

use App\Domain\Notification\Models\Notification;

class NotificationSent
{
    public Notification $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }
}
