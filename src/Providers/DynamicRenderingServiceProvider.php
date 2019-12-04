<?php

namespace Coderello\DynamicRendering\Providers;

use Coderello\DynamicRendering\Managers\DynamicRendererManager;
use Coderello\DynamicRendering\Middleware\DynamicRenderingMiddleware;
use Coderello\DynamicRendering\Renderers\DynamicRenderer;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;

class DynamicRenderingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap shared data service.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMiddleware();

        $this->registerPublishing();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();

        $this->registerBindings();
    }

    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__ . '/../../config/dynamic-rendering.php' => config_path('dynamic-rendering.php'),
        ], 'dynamic-rendering-config');
    }

    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/dynamic-rendering.php',
            'dynamic-rendering'
        );
    }

    protected function registerBindings()
    {
        $this->app->singleton('dynamic.renderer', function ($app) {
            return new DynamicRendererManager($app);
        });
    }

    protected function registerMiddleware()
    {
        /** @var Kernel $kernel */
        $kernel = $this->app[Kernel::class];

        $kernel->pushMiddleware(DynamicRenderingMiddleware::class);
    }
}
