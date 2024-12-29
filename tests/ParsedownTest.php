<?php

namespace Kudashevs\LaravelParsedown\Tests;

use Kudashevs\LaravelParsedown\Parsedown;

class ParsedownTest extends TestCase
{
    /** @test */
    public function it_can_parse_a_line(): void
    {
        $text = '**Parsedown** Test';
        $expected = '<strong>Parsedown</strong> Test';
        $parsedown = new Parsedown();

        $this->assertSame($expected, $parsedown->line($text));
    }

    /** @test */
    public function it_can_parse_a_text(): void
    {
        $text = '**Parsedown** Test';
        $expected = '<p><strong>Parsedown</strong> Test</p>';
        $parsedown = new Parsedown();

        $this->assertSame($expected, $parsedown->text($text));
    }
}
