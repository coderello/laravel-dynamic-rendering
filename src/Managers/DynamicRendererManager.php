<?php

namespace Coderello\DynamicRenderer\Managers;

use Coderello\DynamicRenderer\Renderers\PrerenderLocalRenderer;
use Coderello\DynamicRenderer\Renderers\Renderer;
use Coderello\DynamicRenderer\Support\RenderingResult;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Manager;

class DynamicRendererManager extends Manager implements Renderer
{
    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->getConfigValue('dynamic-renderer.driver', 'prerender_local');
    }

    private function getConfigValue(string $key, $default = null)
    {
        // todo
        return Config::get($key, $default);
    }

    public function createPrerenderLocalDriver()
    {
        return new PrerenderLocalRenderer(
            $this->getConfigValue('dynamic-renderer.prerender_local', [])
        );
    }

    public function render(string $url): RenderingResult
    {
        /** @var Renderer $driver */
        $driver = $this->driver();

        return $driver->render($url);
    }
}
