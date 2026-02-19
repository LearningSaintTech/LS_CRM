<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BelongsToVendor;


class Menu extends Model
{
    use BelongsToVendor;
    use HasFactory;
    protected $table = "menu_setting";
    protected $fillable = [        
        'menu_name',
    ];
}
