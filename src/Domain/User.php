<?php

namespace Untitledpng\LaravelPolicyRoles\Domain;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 *
 * @property Role[] $roles
 * @property $assignRole
 *
 *
 * @package Untitledpng\LaravelPolicyRoles\Domain
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * Get all roles of this user.
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Assign a role to this user.
     *
     * @param Role $role
     * @return Model
     */
    public function assignRole(Role $role): Model
    {
        return $this->roles()->save($role);
    }

    /**
     * Check if the user has the role.
     *
     * @param $role
     * @return bool
     */
    public function hasRole($role): bool
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }
        return (bool) $role->intersect($this->roles)->count();
    }
}
