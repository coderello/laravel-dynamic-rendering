<?php

namespace Coderello\DynamicRendering\Managers;

use Coderello\DynamicRendering\Renderers\PrerenderRenderer;
use Coderello\DynamicRendering\Renderers\Renderer;
use Coderello\DynamicRendering\Renderers\RendertronRenderer;
use Coderello\DynamicRendering\Support\RenderingResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Manager;

class RendererManager extends Manager implements Renderer
{
    public function getDefaultDriver(): string
    {
        return $this->getConfigValue('dynamic-rendering.default');
    }

    private function getConfigValue(string $key, $default = null)
    {
        // todo
        return Config::get($key, $default);
    }

    private function getRendererConfig(string $renderer): array
    {
        return $this->getConfigValue('dynamic-rendering.renderers.'.$renderer, []);
    }

    public function createPrerenderDriver(): PrerenderRenderer
    {
        return new PrerenderRenderer(
            $this->getRendererConfig('prerender')
        );
    }

    public function createRendertronDriver(): RendertronRenderer
    {
        return new RendertronRenderer(
            $this->getRendererConfig('rendertron')
        );
    }

    public function render(string $url): RenderingResult
    {
        return $this->driver()->render($url);
    }

    public function isRendering(Request $request): bool
    {
        return $this->driver()->isRendering($request);
    }

    public function driver($driver = null): Renderer
    {
        return parent::driver($driver);
    }
}
