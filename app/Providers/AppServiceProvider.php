<?php

namespace App\Providers;

use App\Models\Theme;
use App\Repositories\ThemeRepository;
use App\Repositories\ThemeVariabelRepository;
use App\Repositories\UserRepository;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
