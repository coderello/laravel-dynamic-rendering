<?php

namespace Coderello\DynamicRendering\RenderingCriteria;

use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class IsEnabled implements RenderingCriterion
{
    /**
     * @var Config
     */
    private $config;

    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    public function matches(Request $request): bool
    {
        return (bool) $this->config->get('dynamic-rendering.enabled', true);
    }
}
