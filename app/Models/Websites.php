<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
// use App\Traits\BelongsToVendor;

class Websites extends Model
{
    // use BelongsToVendor;
     use SoftDeletes;
     use HasFactory;
    protected $dates = ['deleted_at'];
    protected $table = "websites";

    protected $fillable = [
        'sitename',
        'url',
        'email',
        'vendor_id',
        'status',
        'logoUrl',
        'smtpPassword',
        'smtpHost',
        'smtpPort',
        'smtpEmail',
        'ccEmail',
        'bccEmail',
        'certificateAuthority',
        'certificateUrl',
        'smtp_security',
    ];

    public function vendor(){
        return $this->belongsTo(Vendor::class ,'vendor_id');
    }
}
