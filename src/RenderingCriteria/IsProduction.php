<?php

namespace Coderello\DynamicRendering\RenderingCriteria;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class IsProduction implements RenderingCriterion
{
    /**
     * @var Application
     */
    private $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function matches(Request $request): bool
    {
        return $this->application->environment('production');
    }
}
