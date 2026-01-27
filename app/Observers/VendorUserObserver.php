<?php

namespace App\Observers;
use App\Models\Vendoruser;
use App\Models\User;
use App\Notifications\AssignDataNotification;


class VendorUserObserver
{
    /**
     * Handle the Vendoruser "created" event.
     */
    public function created($createuser): void
    {
        // $admin = User::where('role', 'admin')->get();
        $admin = User::get();
        // dd($admin);
        foreach ($admin as $user) {
            $user->notify(new AssignDataNotification($createuser));
        }
    }

    /**
     * Handle the Vendoruser "updated" event.
     */

    public function updated(Vendoruser $vendoruser): void
    {

    }

    /**
     * Handle the Vendoruser "deleted" event.
     */
    public function deleted(Vendoruser $vendoruser): void
    {
        //
    }

    /**
     * Handle the Vendoruser "restored" event.
     */
    public function restored(Vendoruser $vendoruser): void
    {
        //
    }

    /**
     * Handle the Vendoruser "force deleted" event.
     */
    public function forceDeleted(Vendoruser $vendoruser): void
    {
        //
    }
}
