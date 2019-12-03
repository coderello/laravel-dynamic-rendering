<?php

namespace Coderello\DynamicRenderer\Providers;

use Coderello\DynamicRenderer\Managers\DynamicRendererManager;
use Coderello\DynamicRenderer\Middleware\DynamicRendererMiddleware;
use Coderello\DynamicRenderer\Renderers\Renderer;
use Illuminate\Contracts\Http\Kernel;
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
            __DIR__ . '/../../config/dynamic-renderer.php' => config_path('dynamic-renderer.php'),
        ], 'dynamic-renderer-config');
    }

    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/dynamic-renderer.php',
            'dynamic-renderer'
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

        $kernel->pushMiddleware(DynamicRendererMiddleware::class);
    }
}
