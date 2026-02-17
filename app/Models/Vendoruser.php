<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendoruser extends Model
{
    //
    protected $table = 'vendoruser';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'description',
        'status',
        'vendor_id',
        'created_by'
    ];

    public function vendor()
        {
            return $this->belongsTo(Vendor::class, 'vendor_id');
        }
}
