<?php

namespace Coderello\DynamicRenderer\Renderers;

use Coderello\DynamicRenderer\Support\RenderingResult;

interface Renderer
{
    public function render(string $url): RenderingResult;
}
