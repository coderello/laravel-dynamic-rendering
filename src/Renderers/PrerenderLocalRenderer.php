<?php

namespace Coderello\DynamicRenderer\Renderers;

use Coderello\DynamicRenderer\RenderedPage;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Str;

class PrerenderLocalRenderer implements Renderer
{
    /**
     * @var string|null
     */
    protected $serviceUrl;

    public function __construct(array $options = [])
    {
        $this->serviceUrl = $options['service_url'] ?? null;
    }

    public function render(string $url): RenderedPage
    {
        $client = new Client;

        $response = $client->get(Str::finish($this->serviceUrl, '/').$url, [
            RequestOptions::HTTP_ERRORS => false,
        ]);

        return (new RenderedPage)
            ->setContent($response->getBody()->getContents())
            ->setStatusCode($response->getStatusCode());
    }
}
