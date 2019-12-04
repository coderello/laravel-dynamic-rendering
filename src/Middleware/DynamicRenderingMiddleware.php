<?php

namespace Coderello\DynamicRendering\Middleware;

use Closure;
use Coderello\DynamicRendering\Facades\DynamicRenderer;
use Coderello\DynamicRendering\Renderers\DynamicRenderer;
use Coderello\DynamicRendering\Support\RenderingCriteriaChecker;
use Illuminate\Contracts\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DynamicRenderingMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($this->shouldRenderDynamically($request)) {
            return $this->renderDynamically($request);
        }

        return $next($request);
    }

    protected function shouldRenderDynamically(Request $request): bool
    {
        /** @var RenderingCriteriaChecker $renderingCriteriaChecker */
        $renderingCriteriaChecker = app(RenderingCriteriaChecker::class);

        return $renderingCriteriaChecker->matchesAll($request);
    }

    protected function renderDynamically(Request $request): Response
    {
        $url = $request->fullUrl();

        $renderingResult = DynamicRenderer::render($url);

        return response(
            $renderingResult->getContent(),
            $renderingResult->getStatusCode()
        );
    }
}
