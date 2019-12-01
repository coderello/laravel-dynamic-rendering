<?php

namespace Coderello\DynamicRenderer;

use Closure;
use Illuminate\Http\Request;

class DynamicRendererMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $url = $request->fullUrl();




        return $next($request);
    }
}
