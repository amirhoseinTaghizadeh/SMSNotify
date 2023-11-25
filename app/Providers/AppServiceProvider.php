<?php

namespace App\Providers;

use App\Contracs\SmsNotifierInterface;
use App\Services\SmsProviders\KavenegarSmsNotifier;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SmsNotifierInterface::class, KavenegarSmsNotifier::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
