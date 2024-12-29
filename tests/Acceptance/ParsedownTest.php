<?php

namespace Kudashevs\LaravelParsedown\Tests\Acceptance;

use Kudashevs\LaravelParsedown\Facades\ParsedownFacade;
use Kudashevs\LaravelParsedown\Parsedown;
use Kudashevs\LaravelParsedown\Tests\TestCase;

class ParsedownTest extends TestCase
{
    private Parsedown $parser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->parser = new Parsedown();
    }

    /** @test */
    public function it_can_parse_a_line(): void
    {
        $text = '*Parsedown* Test';
        $expected = '<em>Parsedown</em> Test';

        $this->assertSame($expected, ParsedownFacade::line($text));
    }

    /** @test */
    public function it_can_parsse_a_text(): void
    {
        $text = '***Parsedown*** Test';
        $expected = '<p><strong><em>Parsedown</em></strong> Test</p>';

        $this->assertSame($expected, ParsedownFacade::text($text));
    }

    /** @test */
    public function it_can_parse_a_line_via_facade(): void
    {
        $text = '*Parsedown* Test';
        $expected = '<em>Parsedown</em> Test';

        $this->assertSame($expected, ParsedownFacade::line($text));
    }

    /** @test */
    public function it_can_parse_a_text_via_facade(): void
    {
        $text = '***Parsedown*** Test';
        $expected = '<p><strong><em>Parsedown</em></strong> Test</p>';

        $this->assertSame($expected, ParsedownFacade::text($text));
    }
}
