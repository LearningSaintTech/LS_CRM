<?php

namespace App\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permission extends SpatiePermission
{
    protected $fillable = ['name', 'guard_name', 'menu_id'];
    
    /**
     * Create a new instance of the model.
     */
    public function __construct(array $attributes = [])
    {
        $attributes['guard_name'] = 'web';
        parent::__construct($attributes);
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($permission) {
            $permission->guard_name = 'web';
        });
        
        static::saving(function ($permission) {
            $permission->guard_name = 'web';
        });
    }

    /**
     * Permission belongs to a Menu (menu_setting table).
     */
    public function Menu_details(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
