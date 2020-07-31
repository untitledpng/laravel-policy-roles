<?php

namespace Untitledpng\LaravelPolicyRoles\Domain;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Permission
 *
 * @property int $id
 * @property string $name
 * @property string $label
 * @property string $description
 *
 * @package Untitledpng\LaravelPolicyRoles\Domain
 */
class Permission extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
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
