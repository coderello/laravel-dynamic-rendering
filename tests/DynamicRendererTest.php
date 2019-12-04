<?php

namespace Coderello\DynamicRendering\Tests;

use Coderello\DynamicRendering\Facades\DynamicRenderer;
use Coderello\DynamicRendering\Renderers\PrerenderDynamicRenderer;
use Symfony\Component\Process\Process;

class DynamicRenderingTest extends AbstractTestCase
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
