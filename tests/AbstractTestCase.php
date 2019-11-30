<?php

namespace Coderello\DynamicRenderer\Tests;

use Coderello\DynamicRenderer\DynamicRendererServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class AbstractTestCase extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            DynamicRendererServiceProvider::class,
        ];
    }
}
