<?php

namespace Coderello\DynamicRenderer\RenderingCriteria;

use Coderello\DynamicRenderer\Facades\DynamicRenderer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Jaybizzle\CrawlerDetect\CrawlerDetect;

class IsNotRenderer implements RenderingCriterion
{
    public function matches(Request $request): bool
    {
        return ! DynamicRenderer::isRendering($request);
    }
}
