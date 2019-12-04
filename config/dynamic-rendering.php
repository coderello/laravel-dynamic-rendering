<?php

return [

    /*
     * Enable or disable the dynamic rendering.
     */
    'enabled' => env('DYNAMIC_RENDERING_ENABLED', true),

    /*
     * The driver which is used to render the pages dynamically.
     *
     * Available drivers: "prerender", "rendertron".
     */
    'default' => env('DYNAMIC_RENDERER', 'prerender'),

    /*
     * The list of rendering criteria which should be met to render
     * the page dynamically.
     */
    'rendering_criteria' => [
        \Coderello\DynamicRendering\RenderingCriteria\IsEnabled::class,
        // \Coderello\DynamicRendering\RenderingCriteria\IsProduction::class,
        \Coderello\DynamicRendering\RenderingCriteria\IsNotRenderer::class,
        \Coderello\DynamicRendering\RenderingCriteria\IsCrawler::class,
        \Coderello\DynamicRendering\RenderingCriteria\IsNotStaticFilePath::class,
    ],

    /**
     * The list of renderers and their configurations.
     */
    'renderers' => [

        'prerender' => [
            'url' => env('PRERENDER_URL', 'http://localhost:3000'),
        ],

        'rendertron' => [
            'url' => env('RENDERTRON_URL', 'http://localhost:3000'),
        ],

    ],

];
