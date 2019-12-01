<?php

namespace Coderello\DynamicRenderer;

use Illuminate\Support\Facades\Facade;

/**
 * @method static RenderedPage render(string $url)
 *
 * @see DynamicRendererManager
 */
class DynamicRenderer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'dynamic.renderer';
    }
}
