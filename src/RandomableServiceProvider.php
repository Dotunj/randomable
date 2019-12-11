<?php

namespace Dotunj\Randomable;

use Illuminate\Support\ServiceProvider;

class RandomableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishResources();
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/randomable.php', 'randomable');

        $this->app->bind('randomable', function () {
            return new Randomable();
        });
    }

    protected function publishResources()
    {
        $this->publishes([
            __DIR__.'/../config/randomable.php' => config_path('randomable.php'),
        ], 'randomable-config');

        $this->publishes([
            __DIR__.'/../database/migrations/create_randomables_table.php' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_randomables_table.php'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../database/seeds/RandomableTableSeeder.php' => database_path('seeds/RandomableTableSeeder.php'),
        ], 'seeds');
    }
}
