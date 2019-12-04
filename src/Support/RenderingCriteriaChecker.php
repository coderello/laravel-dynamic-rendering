<?php

namespace Coderello\DynamicRendering\Support;

use Coderello\DynamicRendering\RenderingCriteria\RenderingCriterion;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\Container\Container;
use Illuminate\Http\Request;
use LogicException;

class RenderingCriteriaChecker
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @var Config
     */
    private $config;

    public function __construct(Container $container, Config $config)
    {
        $this->container = $container;
        $this->config = $config;
    }

    public function matchesAll(Request $request): bool
    {
        $criteria = $this->config->get('dynamic-rendering.rendering_criteria', []);

        foreach ($criteria as $criterionClass) {
            $criterion = $this->container->make($criterionClass);

            if (! $criterion instanceof RenderingCriterion) {
                throw new LogicException(
                    sprintf(
                        'A rendering criterion should be an instance of [%s].',
                        RenderingCriterion::class
                    )
                );
            }

            if (! $criterion->matches($request)) {
                return false;
            }
        }

        return true;
    }
}