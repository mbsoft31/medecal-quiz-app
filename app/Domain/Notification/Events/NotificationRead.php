<?php

namespace App\Domain\Notification\Events;

use App\Domain\Notification\Models\Notification;

class NotificationRead
{
    public Notification $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }
}
