<?php

return [

    'enabled' => env('DYNAMIC_RENDERING_ENABLED', true),

    'driver' => 'prerender_local',

    'drivers' => [
        'prerender_local' => [],

        'prerender_io' => [],
    ],

];
