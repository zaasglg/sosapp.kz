<?php

namespace App\Providers;

use App\View\Components\SocialLinks;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register the social links component
        Blade::component('social-links', SocialLinks::class);
    }
}
