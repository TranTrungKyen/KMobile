<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    protected $services = [
        \App\Services\Contracts\StorageServiceInterface::class => \App\Services\Web\StorageService::class,
        \App\Services\Contracts\ColorServiceInterface::class => \App\Services\Web\ColorService::class,
        \App\Services\Contracts\ProductServiceInterface::class => \App\Services\Web\ProductService::class,
        \App\Services\Contracts\SaleServiceInterface::class => \App\Services\Web\SaleService::class,
        \App\Services\Contracts\CategoryServiceInterface::class => \App\Services\Web\CategoryService::class,
        \App\Services\Contracts\BrandServiceInterface::class => \App\Services\Web\BrandService::class,
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
