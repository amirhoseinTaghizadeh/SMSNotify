<?php

namespace App\Providers;

use App\Contracs\SmsNotifierInterface;
use App\Contracts\SmsProvider;
use App\Contracts\SmsService;
use App\Services\KavenegarSmsProvider;
use App\Services\SmsProviders\KavenegarSmsNotifier;
use App\Services\SmsServiceFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SmsProvider::class, KavenegarSmsProvider::class);

        $this->app->bind(SmsService::class , function($app){
            $provider = $app->make(SmsProvider::class);
            return SmsServiceFactory::create($provider);
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
