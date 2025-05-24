<?php

namespace App\Providers;

use App\Repositories\ThemeRepository;
use App\Repositories\UserRepository;
use App\RepositoryInterface\ThemeRepositoryInterface;
use App\RepositoryInterface\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ThemeRepositoryInterface::class, ThemeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
