<?php

return [

    'enabled' => env('DYNAMIC_RENDERER_ENABLED', true),

    'rendering_criteria' => [
        // \Coderello\DynamicRenderer\RenderingCriteria\IsProduction::class,
        \Coderello\DynamicRenderer\RenderingCriteria\IsNotRenderer::class,
        \Coderello\DynamicRenderer\RenderingCriteria\IsCrawler::class,
        \Coderello\DynamicRenderer\RenderingCriteria\IsNotStaticFilePath::class,
    ],

    'driver' => env('DYNAMIC_RENDERER_DRIVER', 'prerender'),

    'prerender' => [
        'url' => env('PRERENDER_URL', 'http://localhost:3000'),
    ],

    'rendertron' => [
        'url' => env('RENDERTRON_URL', 'http://localhost:3000'),
    ],

];
