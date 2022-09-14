<?php

namespace Untitledpng\LaravelPolicyRoles\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Untitledpng\LaravelPolicyRoles\Contracts\Policies\BasePolicyContract;
use Untitledpng\LaravelPolicyRoles\Contracts\Services\PolicyServiceInterface;

class BasePolicy implements BasePolicyContract
{
    use HandlesAuthorization;

    /**
     * @var PolicyServiceInterface
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
     * @param PolicyServiceInterface $policyService
     */
    public function __construct(
        string $modelName,
        PolicyServiceInterface $policyService
    )
    {
        $this->modelName = $modelName;
        $this->policyService = $policyService;
    }

    /**
     * @inheritDoc
     */
    public function view(Authenticatable $user): bool
    {
        return $this->policyService->hasPermission($user, "{$this->modelName}-view");
    }

    /**
     * @inheritDoc
     */
    public function create(Authenticatable $user): bool
    {
        return $this->policyService->hasPermission($user, "{$this->modelName}-create");
    }

    /**
     * @inheritDoc
     */
    public function update(Authenticatable $user): bool
    {
        return $this->policyService->hasPermission($user, "{$this->modelName}-update");
    }

    /**
     * @inheritDoc
     */
    public function delete(Authenticatable $user): bool
    {
        return $this->policyService->hasPermission($user, "{$this->modelName}-delete");
    }

    /**
     * @inheritDoc
     */
    public function restore(Authenticatable $user): bool
    {
        return $this->policyService->hasPermission($user, "{$this->modelName}-restore");
    }

    /**
     * @inheritDoc
     */
    public function viewAny(Authenticatable $user): bool
    {
        return $this->view($user);
    }
}
