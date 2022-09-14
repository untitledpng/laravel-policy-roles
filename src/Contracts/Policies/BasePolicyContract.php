<?php

namespace Untitledpng\LaravelPolicyRoles\Contracts\Policies;

use Illuminate\Foundation\Auth\User as Authenticatable;

interface BasePolicyContract
{
    /**
     * @param  Authenticatable $user
     * @return bool
     */
    public function view(Authenticatable $user): bool;

    /**
     * @param  Authenticatable $user
     * @return bool
     */
    public function create(Authenticatable $user): bool;

    /**
     * @param  Authenticatable $user
     * @return bool
     */
    public function update(Authenticatable $user): bool;

    /**
     * @param  Authenticatable $user
     * @return bool
     */
    public function delete(Authenticatable $user): bool;

    /**
     * @param  Authenticatable $user
     * @return bool
     */
    public function restore(Authenticatable $user): bool;

    /**
     * Determine whether the user can view any posts.
     *
     * @param  Authenticatable  $user
     * @return bool
     */
    public function viewAny(Authenticatable $user): bool;
}
