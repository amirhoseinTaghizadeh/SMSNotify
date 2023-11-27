<?php

namespace App\Providers;


use App\Contracts\SmsService;
use App\Services\SmsServiceFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SmsService::class, function ($app) {
            $factory = $app->make(SmsServiceFactory::class);
            return $factory->createSms();
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
