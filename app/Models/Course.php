<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Course extends Model
{
    use SoftDeletes;
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
