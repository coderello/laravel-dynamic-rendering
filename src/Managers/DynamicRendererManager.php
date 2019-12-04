<?php

namespace Coderello\DynamicRenderer\Managers;

use Coderello\DynamicRenderer\Renderers\PrerenderRenderer;
use Coderello\DynamicRenderer\Renderers\Renderer;
use Coderello\DynamicRenderer\Renderers\RendertronRenderer;
use Coderello\DynamicRenderer\Support\RenderingResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Manager;

class DynamicRendererManager extends Manager implements Renderer
{
    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver(): string
    {
        return $this->getConfigValue('dynamic-renderer.driver');
    }

    private function getConfigValue(string $key, $default = null)
    {
        // todo
        return Config::get($key, $default);
    }

    public function createPrerenderDriver(): PrerenderRenderer
    {
        return new PrerenderRenderer(
            $this->getConfigValue('dynamic-renderer.prerender', [])
        );
    }

    public function createRendertronDriver(): RendertronRenderer
    {
        return new RendertronRenderer(
            $this->getConfigValue('dynamic-renderer.rendertron', [])
        );
    }

    public function render(string $url): RenderingResult
    {
        /** @var Renderer $driver */
        $driver = $this->driver();

        return $driver->render($url);
    }

    public function getUserAgentPatterns(): array
    {
        /** @var Renderer $driver */
        $driver = $this->driver();

        return $driver->getUserAgentPatterns();
    }

    public function isRendering(Request $request): bool
    {
        /** @var Renderer $driver */
        $driver = $this->driver();

        return $driver->isRendering($request);
    }
}
