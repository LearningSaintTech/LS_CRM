<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\BelongsToVendor;


class Enrolment extends Model
{
    use BelongsToVendor;
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = "enrolments";
    protected $fillable = [
        'student_name',
        'profile',
        'course_name',
        'vendor_id',
        'vendor_user_id',
        'enrolled_at',
        'address',
        'email',
        'status'
    ];

    public function vendorUserId()
    {
        return $this->belongsTo(Vendoruser::class, 'vendor_user_id');
    }

    public function vendorId()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}



