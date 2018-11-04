<?php

namespace IsGoms\Admin;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use IsGoms\Admin\Admin as LaravelAdmin;
use IsGoms\Admin\CustomRouter;

class AdminServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig();
        $this->publishViews();
    }

    protected function publishConfig()
    {
        $this->publishes([
            __DIR__.'/config/admin.php' => config_path('admin.php'),
        ]);
    }

    protected function publishViews()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'admin');
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/admin'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('admin', function($app){
            return new LaravelAdmin();
        });
    }
}
