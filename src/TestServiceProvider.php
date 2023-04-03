<?php

namespace Kayise\Test;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'test');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->mergeConfigFrom(__DIR__.'/config/test.php', 'test');

        $this->publishes([__DIR__.'/config/test.php' => config_path('test.php')]);
    }

    public function register()
    {
       //
    }
}