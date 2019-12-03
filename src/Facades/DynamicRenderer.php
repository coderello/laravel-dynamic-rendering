<?php

namespace Coderello\DynamicRenderer\Facades;

use Coderello\DynamicRenderer\Managers\DynamicRendererManager;
use Coderello\DynamicRenderer\Support\RenderingResult;
use Illuminate\Support\Facades\Facade;

/**
 * @method static RenderingResult render(string $url)
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
