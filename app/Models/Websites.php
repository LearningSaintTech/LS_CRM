<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Websites extends Model
{
    use HasFactory;
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
    ];

    public function vendor(){
        return $this->belongsTo(Vendor::class ,'vendor_id');
    }
}
