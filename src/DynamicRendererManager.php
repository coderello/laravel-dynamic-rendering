<?php

namespace Coderello\DynamicRenderer;

use Coderello\DynamicRenderer\Renderers\PrerenderLocalRenderer;
use Coderello\DynamicRenderer\Renderers\Renderer;
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
        return $this->config->get('dynamic-renderer.driver', 'prerender_local');
    }

    public function createPrerenderLocalDriver()
    {
        return new PrerenderLocalRenderer(
            $this->config->get('dynamic-renderer.prerender_local', [])
        );
    }

    public function render(string $url): RenderedPage
    {
        /** @var Renderer $driver */
        $driver = $this->driver();

        return $driver->render($url);
    }
}
