<?php

namespace AlvariumDigital\PermissionsMakr;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PermissionsMakrServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->configure();
    }

    /**
     * Setup the configuration for package
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/permissions_makr.php', 'permissions_makr'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerRoutes();
        $this->registerMigrations();
        $this->registerPublishing();
        $this->registerCommands();
    }

    /**
     * Register the package routes
     *
     * @return void
     */
    protected function registerRoutes(): void
    {
        Route::prefix('permission_makr')
            ->namespace('AlvariumDigital\\PermissionsMakr\\Http\\Controllers')
            ->as('permission_makr.')
            ->middleware(config('permission_makr.routes_middleware'))
            ->group(__DIR__ . '/routes/web.php');
    }

    /**
     * Register the package migrations
     *
     * @return void
     */
    protected function registerMigrations(): void
    {
        if (config('permission_makr.migrations')) {
            $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        }
    }

    /**
     * Register the package's publishable resources
     *
     * @return void
     */
    protected function registerPublishing(): void
    {
        $this->publishes([
            __DIR__.'/config/permissions_makr.php' => config_path('permissions_makr.php'),
        ]);

        $this->publishes([
            __DIR__ . '/database/migrations/' => database_path('migrations')
        ], 'migrations');
    }

    /**
     * Register the package's publishable resources
     *
     * @return void
     */
    protected function registerCommands(): void
    {
        $this->commands([

        ]);
    }
}
