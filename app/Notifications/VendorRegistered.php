<?php
    namespace App\Notifications;
    use Illuminate\Bus\Queueable;
    use Illuminate\Notifications\Notification;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Notifications\Messages\BroadcastMessage;

class VendorRegistered extends Notification implements ShouldQueue
{
    use Queueable;

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable)
    {
        return [
            'title'   => 'New Vendor Registration',
            'message' => 'A new vendor has been registered',
            'url'     => route('vendor.list'),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'title'   => 'New Vendor Registration',
            'message' => 'A new vendor has been registered',
            'url'     => route('vendor.list'),
        ]);
    }
}
