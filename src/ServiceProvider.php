<?php

namespace Untitledpng\LaravelPolicyRoles;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../resources/migrations');
    }

    /**
     * Register classes in the app.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(
            \Untitledpng\LaravelPolicyRoles\Contracts\Repositories\PermissionRepositoryContract::class,
            \Untitledpng\LaravelPolicyRoles\Repositories\PermissionRepository::class
        );

        $this->app->singleton(
            \Untitledpng\LaravelPolicyRoles\Contracts\Services\PolicyServiceInterface::class,
            \Untitledpng\LaravelPolicyRoles\Services\PolicyService::class
        );

        $this->app->bind(
            \Untitledpng\LaravelPolicyRoles\Contracts\Policies\BasePolicyContract::class,
            \Untitledpng\LaravelPolicyRoles\Policies\BasePolicy::class
        );
    }
}
