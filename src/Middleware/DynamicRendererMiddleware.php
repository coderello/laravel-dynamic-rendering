<?php

namespace Coderello\DynamicRenderer\Middleware;

use Closure;
use Coderello\DynamicRenderer\Facades\DynamicRenderer;
use Coderello\DynamicRenderer\Renderers\Renderer;
use Coderello\DynamicRenderer\Support\RenderingCriteriaChecker;
use Illuminate\Contracts\Container\Container;
use Illuminate\Http\Request;

class DynamicRendererMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /** @var RenderingCriteriaChecker $renderingCriteriaChecker */
        $renderingCriteriaChecker = app(RenderingCriteriaChecker::class);

        if ($renderingCriteriaChecker->matchesAll($request)) {
            $url = $request->fullUrl();

            $renderingResult = DynamicRenderer::render($url);

            return response(
                $renderingResult->getContent(),
                $renderingResult->getStatusCode()
            );
        }

        return $next($request);
    }
}
