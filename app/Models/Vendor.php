<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Vendor extends Model
{
    protected $table = 'vendors';


     protected $fillable = [
        'name',
        'email',
        'phone',
        'company_name',
        'gst_number',
        'pan_number',
        'address',
        'city',
        'state',
        'pincode',
        'profile_image',
        'opening_balance',
        'status',
    ];
}