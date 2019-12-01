<?php

namespace Coderello\DynamicRenderer\Renderers;

use Coderello\DynamicRenderer\RenderedPage;

interface Renderer
{
    public function render(string $url): RenderedPage;
}
