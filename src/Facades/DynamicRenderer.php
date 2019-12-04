<?php

namespace Coderello\DynamicRenderer\Facades;

use Coderello\DynamicRenderer\Managers\DynamicRendererManager;
use Coderello\DynamicRenderer\Support\RenderingResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;

/**
 * @method static RenderingResult render(string $url)
 * @method static bool isRendering(Request $request)
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
