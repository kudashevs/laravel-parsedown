<?php

namespace Kudashevs\LaravelParsedown\Tests;

use Parsedown;

/**
 * Class HelperTest
 * @package Tests
 */
class HelperTest extends TestCase
{
    /** @test */
    public function it_can_cast_string(): void
    {
        $actual = parsedown('**Parsedown** Test');
        $expected = '<p><strong>Parsedown</strong> Test</p>';

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_inline_string(): void
    {
        $actual = parsedown('**Parsedown** Test', true);
        $expected = '<strong>Parsedown</strong> Test';

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_handle_no_arguments(): void
    {
        $actual = parsedown();
        $expected = Parsedown::class;

        $this->assertInstanceOf($expected, $actual);
    }

    /** @test */
    public function it_can_handle_null(): void
    {
        $actual = parsedown(null);
        $expected = '';

        $this->assertSame($expected, $actual);
    }
}
