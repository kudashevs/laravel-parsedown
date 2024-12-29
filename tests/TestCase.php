<?php

namespace Kudashevs\LaravelParsedown\Tests;

use Illuminate\Foundation\Application;
use Illuminate\View\Compilers\BladeCompiler;
use Parsedown\Providers\ParsedownServiceProvider;

/**
 * Class TestCase
 * @package Tests
 */
abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected string $text = '**Parsedown** UnitTest';

    protected function getCompiler(): BladeCompiler
    {
        return $this->app->make(BladeCompiler::class);
    }

    protected function getPackageProviders($app)
    {
        return [
            ParsedownServiceProvider::class
        ];
    }
}
