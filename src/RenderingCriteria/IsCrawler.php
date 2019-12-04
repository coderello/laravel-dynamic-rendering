<?php

namespace Coderello\DynamicRenderer\RenderingCriteria;

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
        $userAgent = strtolower($request->userAgent());

        foreach ($this->botUserAgents() as $botUserAgent) {
            if ($userAgent === strtolower($botUserAgent)) {
                return true;
            }
        }

        return false;
    }

    protected function botUserAgents(): array
    {
        return [
            'Baiduspider',
            'bingbot',
            'Embedly',
            'facebookexternalhit',
            'LinkedInBot',
            'outbrain',
            'pinterest',
            'quora link preview',
            'rogerbot',
            'showyoubot',
            'Slackbot',
            'TelegramBot',
            'Twitterbot',
            'vkShare',
            'W3C_Validator',
            'WhatsApp',
        ];
    }
}
