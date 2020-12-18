<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Libs\Repositories\Eloquent\RoleRepository;
use Libs\Repositories\Eloquent\UserRepository;
use Libs\Repositories\Interfaces\RoleRepositoryInterface;
use Libs\Repositories\Interfaces\UserRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
