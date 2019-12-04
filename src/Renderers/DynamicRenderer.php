<?php

namespace Coderello\DynamicRendering\Renderers;

use Coderello\DynamicRendering\Support\RenderingResult;
use Illuminate\Http\Request;

interface DynamicRenderer
{
    public function render(string $url): RenderingResult;

    public function isRendering(Request $request): bool;
}
