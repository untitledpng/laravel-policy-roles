# laravel-policy-roles
Add multiple roles to a user and handle their policies

## Installation
Extend your user model with `Untitledpng\LaravelPolicyRoles\Domain\User`

## Example policy
```php
use Untitledpng\LaravelPolicyRoles\Domain\Permission;

class ItemPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view the item.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(User $user)
    {
        $permission = Permission::where('name', 'items-view')->first();
        return $user->hasRole($permission->roles);
    }
    /**
     * Determine whether the user can create items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $permission = Permission::where('name', 'items-create')->first();
        return $user->hasRole($permission->roles);
    }
    /**
     * Determine whether the user can update the item.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
        $permission = Permission::where('name', 'items-update')->first();
        return $user->hasRole($permission->roles);
    }
    /**
     * Determine whether the user can delete the item.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        $permission = Permission::where('name', 'items-delete')->first();
        return $user->hasRole($permission->roles);
    }
}
```
