<?php

namespace Coderello\DynamicRendering\Facades;

use Coderello\DynamicRendering\Managers\DynamicRenderingManager;
use Coderello\DynamicRendering\Support\RenderingResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

/**
 * @method static RenderingResult render(string $url)
 * @method static bool isRendering(Request $request)
 *
 * @see DynamicRenderingManager
 */
class DynamicRenderer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'dynamic.renderer';
    }
}
