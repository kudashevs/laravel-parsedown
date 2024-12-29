<?php

namespace Kudashevs\LaravelParsedown\Tests\Unit;

use Kudashevs\LaravelParsedown\Parsedown;
use Kudashevs\LaravelParsedown\Tests\TestCase;

class ParsedownTest extends TestCase
{
    private Parsedown $parser;

    protected function setUp(): void
    {
        $this->parser = new Parsedown();
    }

    /** @test */
    public function it_can_parse_a_line(): void
    {
        $expected = '<strong>Parsedown</strong> Test';
        $text = '**Parsedown** Test';

        $this->assertSame($expected, $this->parser->line($text));
    }

    /** @test */
    public function it_can_parse_a_text(): void
    {
        $expected = '<p><strong>Parsedown</strong> Test</p>';
        $text = '**Parsedown** Test';

        $this->assertSame($expected, $this->parser->text($text));
    }
}