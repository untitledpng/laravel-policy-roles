<?php

namespace Untitledpng\LaravelPolicyRoles\Services;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Untitledpng\LaravelPolicyRoles\Contracts\Repositories\PermissionRepositoryContract;
use Untitledpng\LaravelPolicyRoles\Contracts\Services\PolicyServiceInterface;

class PolicyService implements PolicyServiceInterface
{
    /**
     * @var PermissionRepositoryContract
     */
    private $permissionRepository;

    /**
     * @param  PermissionRepositoryContract $permissionRepository
     */
    public function __construct(PermissionRepositoryContract $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @inheritDoc
     */
    public function hasPermission(Authenticatable $user, string $permission): bool
    {
        $model = $this->permissionRepository->getPermissionByName($permission);

        if (null === $model) {
            /**
             * Permission does not exist, prevent access.
             */
            return false;
        }

        return $user->hasRole(
            $model->roles
        );
    }
}
