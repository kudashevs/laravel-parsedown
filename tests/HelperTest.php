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
        $actual = parsedown($this->text);
        $expected = '<p><strong>Parsedown</strong> UnitTest</p>';

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_inline_string(): void
    {
        $actual = parsedown($this->text, true);
        $expected = '<strong>Parsedown</strong> UnitTest';

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
