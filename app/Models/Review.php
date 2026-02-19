<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToVendor;


class Review extends Model
{
    use BelongsToVendor;
    protected $dates = ['deleted_at'];

    protected $table = "reviews";
    protected $fillable = [
        'student_name',
        'vendor_id',
        'profile',
        'vendor_user_id',
        'rating',
        'review',
        'status'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function vendoruserid()
    {
        return $this->belongsTo(Vendoruser::class, 'vendor_user_id');
    }
}
