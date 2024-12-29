<?php

namespace Kudashevs\LaravelParsedown\Tests\Unit;

use Kudashevs\LaravelParsedown\Tests\TestCase;

/**
 * Class HelperTest
 * @package Tests
 */
class HelperTest extends TestCase
{
    /** @test */
    public function it_can_parse_string(): void
    {
        $expected = '<p><strong>Parsedown</strong> Test</p>';
        $actual = parsedown('**Parsedown** Test');

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_inline_string(): void
    {
        $expected = '<strong>Parsedown</strong> Test';
        $actual = parsedown('**Parsedown** Test', true);

        $this->assertSame($expected, $actual);
    }
}
