<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Traits\BelongsToVendor;



class Course extends Model
{
    use SoftDeletes;
    // use BelongsToVendor;
    protected $table = "course";
    protected $fillable = [
        'name',
        'url',
        'price',
        'vendor_id',
        'status',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}
