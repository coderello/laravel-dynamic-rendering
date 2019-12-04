<?php

namespace Coderello\DynamicRendering\Managers;

use Coderello\DynamicRendering\Renderers\PrerenderDynamicRenderer;
use Coderello\DynamicRendering\Renderers\DynamicRenderer;
use Coderello\DynamicRendering\Renderers\RendertronDynamicRenderer;
use Coderello\DynamicRendering\Support\RenderingResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Manager;

class DynamicRendererManager extends Manager implements DynamicRenderer
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

    public function createPrerenderDriver(): PrerenderDynamicRenderer
    {
        return new PrerenderDynamicRenderer(
            $this->getRendererConfig('prerender')
        );
    }

    public function createRendertronDriver(): RendertronDynamicRenderer
    {
        return new RendertronDynamicRenderer(
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

    public function driver($driver = null): DynamicRenderer
    {
        return parent::driver($driver);
    }
}
