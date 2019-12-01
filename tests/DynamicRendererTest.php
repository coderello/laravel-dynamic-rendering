<?php

namespace Coderello\DynamicRenderer\Tests;

use Coderello\DynamicRenderer\DynamicRenderer;
use Coderello\DynamicRenderer\DynamicRendererManager;
use Coderello\DynamicRenderer\Renderers\PrerenderLocalRenderer;
use Coderello\DynamicRenderer\Renderers\Renderer;

class DynamicRendererTest extends AbstractTestCase
{
    /** @var Renderer */
    protected $dynamicRenderer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dynamicRenderer = app(DynamicRendererManager::class);
    }

    public function testTrue()
    {
        $renderedPage = $this->dynamicRenderer
            ->render('https://coderello.test/404');

        DynamicRenderer::render('https://coderello.test/404');

        $this->assertTrue(true);
    }
}
