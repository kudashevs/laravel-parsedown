<?php

namespace Tests;

use Illuminate\Foundation\Application;
use Illuminate\View\Compilers\BladeCompiler;
use Parsedown\Providers\ParsedownServiceProvider;

/**
 * Class TestCase
 * @package Tests
 */
abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected BladeCompiler $compiler;

    protected string $text = '**Parsedown** UnitTest';

    protected function getCompiler()
    {
        if (!$this->compiler) {
            $this->compiler = $this->app->make(BladeCompiler::class);
        }

        return $this->compiler;
    }

    protected function getPackageProviders($app)
    {
        return [
            ParsedownServiceProvider::class
        ];
    }
}
