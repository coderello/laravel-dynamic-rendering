<?php

namespace Coderello\DynamicRenderer\Renderers;

use Coderello\DynamicRenderer\Support\RenderingResult;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PrerenderRenderer implements Renderer
{
    /**
     * @var string|null
     */
    protected $prerenderUrl;

    public function __construct(array $options = [])
    {
        $this->prerenderUrl = $options['url'] ?? null;
    }

    public function render(string $url): RenderingResult
    {
        $client = new Client;

        $response = $client->get(Str::finish($this->prerenderUrl, '/').$url, [
            RequestOptions::HTTP_ERRORS => false,
        ]);

        return (new RenderingResult)
            ->setContent($response->getBody()->getContents())
            ->setStatusCode($response->getStatusCode());
    }

    public function isRendering(Request $request): bool
    {
        return Str::is('*Prerender*', $request->userAgent());
    }
}
