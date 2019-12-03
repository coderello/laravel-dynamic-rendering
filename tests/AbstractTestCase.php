<?php

namespace Coderello\DynamicRenderer\Tests;

use Coderello\DynamicRenderer\Providers\DynamicRendererServiceProvider;
use Orchestra\Testbench\TestCase;
use Symfony\Component\Process\Process;

// todo: check
abstract class AbstractTestCase extends TestCase
{
    /** @var Process */
    private $testingWebServer;

    const WEB_SERVER_HOST = '127.0.0.1';
    const WEB_SERVER_PORT = '8080';

    protected function setUp(): void
    {
        parent::setUp();

        $this->startTestingWebServer();
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->stopTestingWebServer();
    }

    protected function getPackageProviders($app)
    {
        return [
            DynamicRendererServiceProvider::class,
        ];
    }

    private function startTestingWebServer(): void
    {
        $this->testingWebServer = new Process([
            'php',
            '-S',
            sprintf('%s:%d', self::WEB_SERVER_HOST, self::WEB_SERVER_PORT),
            '-t',
            __DIR__.'/web'
        ]);

        $this->testingWebServer->start();

        usleep(100000);
    }

    private function stopTestingWebServer(): void
    {
        $this->testingWebServer->stop();
    }

    protected function getWebUrl(string $path): string
    {
        return sprintf(
            'http://%s:%s/%s',
            self::WEB_SERVER_HOST,
            self::WEB_SERVER_PORT,
            $path
        );
    }
}
