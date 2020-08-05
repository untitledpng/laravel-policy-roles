<?php

namespace Untitledpng\LaravelPolicyRoles\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Untitledpng\LaravelPolicyRoles\Services\PolicyService;

class BasePolicy
{
    use HandlesAuthorization;

    /**
     * @var PolicyService
     */
    private $policyService;
    /**
     * @var string
     */
    private $modelName;

    /**
     * BasePolicy constructor.
     *
     * @param string $modelName
     * @param PolicyService $policyService
     */
    public function __construct(
        string $modelName,
        PolicyService $policyService
    )
    {
        $this->modelName = $modelName;
        $this->policyService = $policyService;
    }

    /**
     * @param  User $user
     * @return bool
     */
    public function view(User $user): bool
    {
        return $this->policyService->hasPermission($user, "{$this->modelName}-view");
    }

    /**
     * @param  User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $this->policyService->hasPermission($user, "{$this->modelName}-create");
    }

    /**
     * @param  User $user
     * @return bool
     */
    public function update(User $user): bool
    {
        return $this->policyService->hasPermission($user, "{$this->modelName}-update");
    }

    /**
     * @param  User $user
     * @return bool
     */
    public function delete(User $user): bool
    {
        return $this->policyService->hasPermission($user, "{$this->modelName}-delete");
    }

    /**
     * @param  User $user
     * @return bool
     */
    public function restore(User $user): bool
    {
        return $this->policyService->hasPermission($user, "{$this->modelName}-restore");
    }

    /**
     * Determine whether the user can view any posts.
     *
     * @param  User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $this->view($user);
    }
}
