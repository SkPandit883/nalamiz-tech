<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\UserInterface;
use App\Repositories\Implementation\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(UserInterface::class,UserRepository::class)  ;
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
