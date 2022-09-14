<?php

namespace Untitledpng\LaravelPolicyRoles\Contracts\Repositories;

use Untitledpng\LaravelPolicyRoles\Models\Permission;

interface PermissionRepositoryContract
{
    /**
     * Get all permissions by name.
     *
     * @param  string $value
     * @return null|Permission
     */
    public function getPermissionByName(string $value): ?Permission;
}
