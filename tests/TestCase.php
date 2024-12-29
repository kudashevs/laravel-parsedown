<?php

namespace Kudashevs\LaravelParsedown\Tests;

use Kudashevs\LaravelParsedown\Facades\ParsedownFacade;
use Kudashevs\LaravelParsedown\Providers\ParsedownServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Get package providers.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            ParsedownServiceProvider::class,
        ];
    }

    /**
     * Get package aliases.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'parsedown' => ParsedownFacade::class,
        ];
    }
}
