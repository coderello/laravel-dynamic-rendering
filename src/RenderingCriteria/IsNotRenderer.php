<?php

namespace Coderello\DynamicRenderer\RenderingCriteria;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IsNotRenderer implements RenderingCriterion
{
    public function matches(Request $request): bool
    {
        $userAgent = $request->userAgent();

        return ! $this->isRenderer($userAgent);
    }

    protected function rendererUserAgentPatterns(): array
    {
        return [
            '*Prerender*',
        ];
    }

    protected function isRenderer(string $userAgent): bool
    {
        foreach ($this->rendererUserAgentPatterns() as $pattern) {
            if (Str::is($pattern, $userAgent)) {
                return true;
            }
        }

        return false;
    }
}
