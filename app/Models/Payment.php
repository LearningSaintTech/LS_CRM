<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payment";
    protected $fillable = [
        'name',
        'vendor_id',
        'secret_key',
        'key',
        'website_id',
        'status',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function website()
    {
        return $this->belongsTo(Websites::class, 'website_id');
    }
}
