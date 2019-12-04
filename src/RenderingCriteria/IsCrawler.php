<?php

namespace Coderello\DynamicRendering\RenderingCriteria;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Jaybizzle\CrawlerDetect\CrawlerDetect;

class IsCrawler implements RenderingCriterion
{
    /**
     * @var CrawlerDetect
     */
    private $crawlerDetect;

    public function __construct(CrawlerDetect $crawlerDetect)
    {
        $this->crawlerDetect = $crawlerDetect;
    }

    public function matches(Request $request): bool
    {
        return $this->crawlerDetect->isCrawler(
            $request->userAgent()
        );
    }
}
