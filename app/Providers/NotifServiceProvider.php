<?php

namespace App\Providers;

use App\View\Components\NotifToast;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class NotifServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('toaster', function () {
            return $this->app->make('App\Services\Toaster');
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::component('toast', NotifToast::class);
    }
}
