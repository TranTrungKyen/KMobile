<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        \App\Repositories\Contracts\ColorRepository::class => \App\Repositories\Eloquent\ColorRepositoryEloquent::class,
        \App\Repositories\Contracts\ProductRepository::class => \App\Repositories\Eloquent\ProductRepositoryEloquent::class,
        \App\Repositories\Contracts\SaleRepository::class => \App\Repositories\Eloquent\SaleRepositoryEloquent::class,
        \App\Repositories\Contracts\CategoryRepository::class => \App\Repositories\Eloquent\CategoryRepositoryEloquent::class,
        \App\Repositories\Contracts\BrandRepository::class => \App\Repositories\Eloquent\BrandRepositoryEloquent::class,
        \App\Repositories\Contracts\AdminUserRepository::class => \App\Repositories\Eloquent\AdminUserRepositoryEloquent::class,
        \App\Repositories\Contracts\ExampleRepository::class => \App\Repositories\Eloquent\ExampleRepositoryEloquent::class,
    ];
    
    /**AC
     * 
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
        foreach ($this->repositories as $interface => $class) {
            $this->app->singleton($interface, $class);
        }
    }
}
