<?php

namespace Coderello\DynamicRenderer\RenderingCriteria;

use Coderello\DynamicRenderer\Facades\DynamicRenderer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Jaybizzle\CrawlerDetect\CrawlerDetect;

class IsNotStaticFilePath implements RenderingCriterion
{
    public function matches(Request $request): bool
    {
        $path = $request->path();

        return ! $this->isStaticFilePath($path);
    }

    protected function isStaticFilePath(string $path): bool
    {
        return preg_match(
            $this->staticFilePathRegexPattern(),
            $path
        );
    }

    protected function staticFilePathRegexPattern(): string
    {
        return '/.+\.('.implode('|', $this->staticFileExtensions()).')$/';
    }

    protected function staticFileExtensions(): array
    {
        return [
            'ai', 'avi', 'css', 'dat', 'dmg', 'doc', 'doc', 'exe', 'flv',
            'gif', 'ico', 'iso', 'jpeg', 'jpg', 'js', 'less', 'm4a', 'm4v',
            'mov', 'mp3', 'mp4', 'mpeg', 'mpg', 'pdf', 'png', 'ppt', 'psd',
            'rar', 'rss', 'svg', 'swf', 'tif', 'torrent', 'ttf', 'txt', 'wav',
            'wmv', 'woff', 'xls', 'xml', 'zip',
        ];
    }
}
