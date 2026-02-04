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
    ];
}
