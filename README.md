# laravel-policy-roles
With this package you can have role based permissions. When the role does not exist, this package will automatically prevent access.
This package also supports Laravel Nova out of the box.

## How to use this package
*  First you have to extend your user eloquent model with `Untitledpng\LaravelPolicyRoles\Domain\User`.
*  Create a new policy like the example policy below.
*  Now add the policy to the `AuthServiceProvider` like you normally would.
*  Add Roles and Permissions to your database.
*  Done!

## Example policy
```php
use Untitledpng\LaravelPolicyRoles\Services\PolicyService;

class UserPolicy extends Untitledpng\LaravelPolicyRoles\Policies\BasePolicy
{
    /**
     * UserPolicy constructor.
     *
     * @param PolicyService $policyService
     */
    public function __construct(
        \Untitledpng\LaravelPolicyRoles\Services\PolicyService $policyService
    ) {
        parent::__construct('user', $policyService);
    }
}
```
