<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class AssignDataNotification extends Notification implements ShouldBroadcastNow
{
    use Queueable;

    public function __construct(public $user)
    {
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title'   => 'Vendor User',
            'message' => "{$this->user->name} has been created",
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'title'   => 'Vendor User',
            'message' => "{$this->user->name} has been created",
        ]);
    }
}
