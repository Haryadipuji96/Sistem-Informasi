<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('role-A', function ($user){
            return $user->role === 'ADMIN';
        });

        Gate::define('role-U', function ($user){
            return $user->role === 'Masyarakat';
        });

        Paginator::useBootstrapFive();
    }
}
