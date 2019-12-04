<?php

namespace Coderello\DynamicRendering\RenderingCriteria;

use Coderello\DynamicRendering\Facades\DynamicRendering;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Jaybizzle\CrawlerDetect\CrawlerDetect;

class IsNotRenderer implements RenderingCriterion
{
    public function matches(Request $request): bool
    {
        return ! DynamicRendering::isRendering($request);
    }
}
