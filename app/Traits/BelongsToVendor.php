<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait BelongsToVendor
{
    protected static function bootBelongsToVendor()
    {
        static::addGlobalScope('vendor', function (Builder $builder) {
            if (session()->has('vendor_id')) {
                $builder->where('vendor_id', session('vendor_id'));
            }
        });
    }

}
