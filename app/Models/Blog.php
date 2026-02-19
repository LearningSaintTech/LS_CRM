<?php

namespace App\Models;
use App\Traits\BelongsToVendor;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Blog extends Model
{
    use HasFactory;
    use BelongsToVendor;
    protected $table = "articles";

    public function websites()
    {
        return $this->hasMany(Websites::class, 'siteId');
    }

}
