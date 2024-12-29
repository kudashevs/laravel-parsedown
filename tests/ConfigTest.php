<?php

namespace Kudashevs\LaravelParsedown\Tests;

use Illuminate\Support\Facades\Config;

/**
 * Class ConfigTest
 * @package Tests
 */
class ConfigTest extends TestCase
{
    protected string $url = 'https://parsedown.org/';

    /** @test */
    public function it_can_disable_safe_mode(): void
    {
        Config::set('parsedown.safe_mode', false);

        $actual = parsedown(
            $expected = '<script />'
        );

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_disable_url_linking(): void
    {
        Config::set('parsedown.urls_linked', false);

        $actual = parsedown($this->url);
        $expected = '<p>' . $this->url . '</p>';

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_enable_breaks_parsing(): void
    {
        Config::set('parsedown.breaks_enabled', true);

        $actual = parsedown('**Parsedown** Test' . PHP_EOL . '**Parsedown** Test');
        $expected = '<p><strong>Parsedown</strong> Test<br />' . PHP_EOL . '<strong>Parsedown</strong> Test</p>';

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_enable_inline_parsing(): void
    {
        Config::set('parsedown.inline', true);

        $actual = parsedown('**Parsedown** Test');
        $expected = '<strong>Parsedown</strong> Test';

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_enable_markup_escaping(): void
    {
        Config::set('parsedown.markup_escaped', true);

        $actual = parsedown('<span>' . '**Parsedown** Test' . '</span>');
        $expected = '<p>' . htmlentities('<span>') . '<strong>Parsedown</strong> Test' . htmlentities('</span>') . '</p>';

        $this->assertSame($expected, $actual);
    }
}
