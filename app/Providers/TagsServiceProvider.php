<?php

namespace Muan\Tags\Providers;

use Illuminate\Support\ServiceProvider;
use Muan\Tags\Console\Commands\TagCreateCommand;

/**
 * Class TagsServiceProvider
 *
 * @package Muan\Tags\Providers
 */
class TagsServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->initMigrations();
        $this->initCommands();
    }

    /**
     * Init migrations
     */
    protected function initMigrations()
    {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }

    /**
     * Init commands
     */
    protected function initCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                TagCreateCommand::class,
            ]);
        }
    }

}
