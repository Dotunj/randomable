<?php

namespace Dotunj\Randomable;

use Illuminate\Support\ServiceProvider;
use Dotunj\Randomable\Randomable;

class RandomableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->publishConfig();

        $this->publishMigrations();

        $this->publishSeeds();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/randomable.php', 'randomable');

        $this->app->bind('randomable', function () {
            return new Randomable();
        });
    }

    protected function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/randomable.php' => config_path('randomable.php')
        ], 'config');
    }

    protected function publishMigrations()
    {
        if (!class_exists('CreateRandomablesTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/create_randomables_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_randomables_table.php')
            ], 'migrations');
        }
    }

    protected function publishSeeds()
    {
        $this->publishes([
            __DIR__ . '/../database/seeds/RandomableTableSeeder.php' => database_path('seeds/RandomableTableSeeder.php')
        ], 'seeds');
    }
}
