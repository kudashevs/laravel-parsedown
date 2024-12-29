<?php

namespace Kudashevs\LaravelParsedown\Tests;

use Illuminate\Support\Facades\Config;

/**
 * Class ConfigTest
 * @package Tests
 */
class ConfigTest extends TestCase
{
    protected string $url = 'http://parsedown.org/';

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

        $actual = parsedown($this->text . PHP_EOL . $this->text);
        $expected = '<p><strong>Parsedown</strong> UnitTest<br />' . PHP_EOL . '<strong>Parsedown</strong> UnitTest</p>';

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_enable_inline_parsing(): void
    {
        Config::set('parsedown.inline', true);

        $actual = parsedown($this->text);
        $expected = '<strong>Parsedown</strong> UnitTest';

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_enable_markup_escaping(): void
    {
        Config::set('parsedown.markup_escaped', true);

        $actual = parsedown('<span>' . $this->text . '</span>');
        $expected = '<p>' . htmlentities('<span>') . '<strong>Parsedown</strong> UnitTest' . htmlentities('</span>') . '</p>';

        $this->assertSame($expected, $actual);
    }
}
