<?php

namespace Untitledpng\LaravelPolicyRoles\Contracts\Services;

use Illuminate\Foundation\Auth\User as Authenticatable;

interface PolicyServiceInterface
{
    /**
     * Check if the user has the permission/ role.
     *
     * @param  Authenticatable $user
     * @param  string $permission
     * @return bool
     */
    public function hasPermission(Authenticatable $user, string $permission): bool;
}
