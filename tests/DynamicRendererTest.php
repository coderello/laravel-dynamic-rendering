<?php

namespace Coderello\DynamicRenderer\Tests;

use Coderello\DynamicRenderer\Facades\DynamicRenderer;
use Coderello\DynamicRenderer\Renderers\PrerenderLocalRenderer;
use Coderello\DynamicRenderer\Renderers\Renderer;
use Symfony\Component\Process\Process;

class DynamicRendererTest extends AbstractTestCase
{
    public function testTemporary()
    {
        $url = $this->getWebUrl('example-1.html');

        $renderingResult = DynamicRenderer::render($url);

        $renderingResultContent = $renderingResult->getContent();

        $renderingResultStatusCode = $renderingResult->getStatusCode();

        $this->assertSame(
            200,
            $renderingResultStatusCode
        );

        $this->assertStringContainsString(
            '<title>Updated title</title>',
            $renderingResultContent
        );

        $this->assertStringContainsString(
            '<h1>Updated heading</h1>',
            $renderingResultContent
        );
    }
}
