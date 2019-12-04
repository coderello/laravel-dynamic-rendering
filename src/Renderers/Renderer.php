<?php

namespace Coderello\DynamicRenderer\Renderers;

use Coderello\DynamicRenderer\Support\RenderingResult;
use Illuminate\Http\Request;

interface Renderer
{
    public function render(string $url): RenderingResult;

    public function isRendering(Request $request): bool;
}
