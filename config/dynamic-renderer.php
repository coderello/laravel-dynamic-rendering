<?php

return [

    'enabled' => env('DYNAMIC_RENDERER_ENABLED', true),

    'rendering_criteria' => [
        // \Coderello\DynamicRenderer\RenderingCriteria\IsProduction::class,
        \Coderello\DynamicRenderer\RenderingCriteria\IsNotRenderer::class,
        \Coderello\DynamicRenderer\RenderingCriteria\IsCrawler::class,
    ],

    'driver' => env('DYNAMIC_RENDERER_DRIVER', 'prerender_local'),

    'prerender_local' => [
        'service_url' => env('PRERENDER_LOCAL_SERVICE_URL', 'http://localhost:3000'),
    ],

    'prerender_io' => [
        // todo: token?
    ],

];
