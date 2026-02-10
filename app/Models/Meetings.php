<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meetings extends Model
{
    protected $table = "meetings";
    protected $fillable = [
        'siteId',
        'name',
        'email',
        'course',
        'phone',
        'supportType',
        'meetingDate',
        'meetingLink',
        'message',
        'level',
        'vendor_id',
        'status',
        'bccEmail'
    ];


    public function site()
    {
        return $this->belongsTo(Websites::class, 'siteId');
    }

    public function vendorUserId()
    {
        return $this->belongsTo(Vendoruser::class, 'vendorUser_id');
    }

    public function vendorId()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}



