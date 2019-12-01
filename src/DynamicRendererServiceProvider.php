<?php

namespace Coderello\DynamicRenderer;

use Illuminate\Support\ServiceProvider;

class DynamicRendererServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap shared data service.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/dynamic-renderer.php',
            'dynamic-renderer'
        );

        $this->app->singleton('dynamic.renderer', function ($app) {
            return new DynamicRendererManager($app);
        });
    }
}
