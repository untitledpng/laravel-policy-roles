<?php

namespace Untitledpng\LaravelPolicyRoles\Services;

use App\User;
use Illuminate\Support\Facades\DB;
use Untitledpng\LaravelPolicyRoles\Domain\Permission;
use Untitledpng\LaravelPolicyRoles\Domain\Role;

class PolicyService
{
    /**
     * Check if the user has the permission/ role.
     *
     * @param  User $user
     * @param  string $permission
     * @return bool
     */
    public function hasPermission(User $user, string $permission): bool
    {
        /** @var Permission $permission */
        if (null === ($permission = Permission::where('name', $permission)->first())) {
            /**
             * Permission does not exist, prevent access.
             */
            return false;
        }

        return $user->hasRole($permission->roles);
    }
}
