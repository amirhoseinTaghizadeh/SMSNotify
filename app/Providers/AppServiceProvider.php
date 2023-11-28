<?php

namespace App\Providers;


use App\Contracts\SmsService;
use App\Services\SmsServiceFactory;
use App\Services\SMSServiceProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SMSService::class, SMSServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
