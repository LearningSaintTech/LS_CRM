<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Vendoruser;
use App\Observers\VendorUserObserver;
use Illuminate\Support\Facades\View;
use App\Models\Vendor;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vendoruser::observe(VendorUserObserver::class);

            // View::composer('layouts.header', function ($view) {
            //     $vendors = Vendor::where('status', 1)->get();
            //     $view->with('vendors', $vendors);
            // });

    }
}
