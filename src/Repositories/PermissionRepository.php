<?php

namespace Untitledpng\LaravelPolicyRoles\Repositories;

use Untitledpng\LaravelPolicyRoles\Contracts\Repositories\PermissionRepositoryContract;
use Untitledpng\LaravelPolicyRoles\Models\Permission;

class PermissionRepository implements PermissionRepositoryContract
{
    /**
     * @inheritDoc
     */
    public function getPermissionByName(string $value): ?Permission
    {
        return Permission::query(
            //
        )->where(
            'name',
            $value
        )->first();
    }
}
