<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role as SpatieRole;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends SpatieRole
{
    use HasFactory, SoftDeletes;

    /**
     * Mass assignable attributes.
     * Spatie\Role already manages name/guard_name; we keep description/slug if needed.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /**
     * Users that have this role.
     * Use the configured table name from the permission config (model_has_roles)
     * Spatie uses a morph relation internally; a simple belongsToMany will work for checks like exists().
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, config('permission.table_names.model_has_roles'), 'role_id', 'model_id');
    }

    // Note: Spatie's package provides the permission relations and role-permission syncing.
    // Remove custom belongsToMany definitions to avoid conflicts with Spatie's table names.
}
