<?php

namespace Untitledpng\LaravelPolicyRoles\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Role
 *
 * @property int $id
 * @property string $name
 * @property string $label
 * @property string $description
 *
 * @property Permission[] $permissions
 * @property boolean $hasPermission
 * @property boolean $inRole
 *
 * @package Untitledpng\LaravelPolicyRoles\Domain
 */
class Role extends Model
{
    /**
     * @inheritDoc
     */
    protected $guarded = [
        'id'
    ];

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'name',
        'label',
        'description',
    ];

    /**
     * Get the users permissions.
     *
     * @return BelongsToMany
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * @param  Permission $permission
     * @return Model
     */
    public function givePermissionTo(Permission $permission): Model
    {
        return $this->permissions()->save($permission);
    }

    /**
     * Determine if the user may perform the given permission.
     *
     * @param  Permission $permission
     * @param  User $user
     * @return boolean
     */
    public function hasPermission(Permission $permission, User $user): bool
    {
        return $this->hasRole($permission->roles);
    }

    /**
     * Determine if the role has the given permission.
     *
     * @param  mixed $permission
     * @return boolean
     */
    public function inRole($permission): bool
    {
        if (is_string($permission)) {
            return $this->permissions->contains('name', $permission);
        }

        return (bool) $permission->intersect($this->permissions)->count();
    }
}
