<?php

namespace Untitledpng\LaravelPolicyRoles\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Permission
 *
 * @property int $id
 * @property string $name
 * @property string $label
 * @property string $description
 * @property Role[] $roles
 * @property bool $inRole
 *
 * @package Untitledpng\LaravelPolicyRoles\Domain
 */
class Permission extends Model
{
    /**
     * @inheritDoc
     */
    protected $guarded = ['id'];

    /**
     * @inheritDoc
     */
    protected $fillable = array('name', 'label', 'description');

    /**
     * Get all roles.
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Determine if the permission belongs to the role.
     *
     * @param  mixed $role
     * @return boolean
     */
    public function inRole($role): bool
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return (bool) $role->intersect($this->roles)->count();
    }
}
