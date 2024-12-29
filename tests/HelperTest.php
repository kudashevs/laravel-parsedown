<?php

namespace Kudashevs\LaravelParsedown\Tests;

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
}
