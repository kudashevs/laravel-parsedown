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

        config()->set('parsedown.enable_extra', true);
        $this->parser = app('parsedown');
    }

    /** @test */
    public function it_can_parse_a_line(): void
    {
        $text = '*Parsedown* Test';
        $expected = '<em>Parsedown</em> Test';

        $this->assertSame($expected, $this->parser->line($text));
    }

    /** @test */
    public function it_can_parsse_a_text(): void
    {
        $text = '***Parsedown*** Test';
        $expected = '<p><strong><em>Parsedown</em></strong> Test</p>';

        $this->assertSame($expected, $this->parser->text($text));
    }

    /** @test */
    public function it_can_parse_a_text_with_extra(): void
    {
        $text = '## Parsedown Test {.info}';
        $expected = '<h2 class="info">Parsedown Test</h2>';

        $this->assertSame($expected, $this->parser->text($text));
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
