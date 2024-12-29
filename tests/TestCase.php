<?php

namespace Kudashevs\LaravelParsedown\Tests;

use Kudashevs\LaravelParsedown\Providers\ParsedownServiceProvider;

/**
 * Class TestCase
 * @package Tests
 */
abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected string $text = '**Parsedown** UnitTest';


    protected function getPackageProviders($app)
    {
        return [
            ParsedownServiceProvider::class,
        ];
    }
}
