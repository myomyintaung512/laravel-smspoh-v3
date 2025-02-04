<?php

namespace myomyintaung512\LaravelSmspoh;

use Illuminate\Support\ServiceProvider;

class SMSPohServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/smspoh.php' => config_path('smspoh.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/smspoh.php',
            'smspoh'
        );

        $this->app->singleton('smspoh', function ($app) {
            return new SMSPoh(
                config('smspoh.api_key'),
                config('smspoh.api_secret'),
                config('smspoh.sender_id'),
                config('smspoh.base_url')
            );
        });
    }
}
