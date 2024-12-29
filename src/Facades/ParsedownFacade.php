<?php

namespace Kudashevs\LaravelParsedown\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @todo don't forget to update these method signatures
 *
 * @method string line(string $text)
 * @method string text(string $text)
 */
class ParsedownFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'parsedown';
    }
}
