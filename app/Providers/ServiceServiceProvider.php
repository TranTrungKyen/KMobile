<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    protected $services = [
        \App\Services\Contracts\AdminUserServiceInterface::class => \App\Services\Web\AdminUserService::class,
        \App\Services\Contracts\AuthAdminServiceInterface::class => \App\Services\Web\AuthAdminService::class,
        \App\Services\Contracts\AuthServiceInterface::class => \App\Services\Web\AuthService::class,
        \App\Services\Contracts\ExamplesServiceInterface::class => \App\Services\Api\ExamplesService::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->services as $interface => $class) {
            $this->app->singleton($interface, $class);
        }
    }
}
