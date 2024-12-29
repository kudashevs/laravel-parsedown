<?php

namespace Kudashevs\LaravelParsedown\Tests\Unit;

use Illuminate\Support\Facades\Config;
use Kudashevs\LaravelParsedown\Tests\TestCase;

/**
 * Class ConfigTest
 * @package Tests
 */
class ConfigTest extends TestCase
{
    protected string $url = 'https://parsedown.org/';

    /** @test */
    public function it_can_enable_safe_mode(): void
    {
        Config::set('parsedown.safe_mode', true);

        $expected = htmlentities('<script />');
        $actual = parsedown('<script />', true);

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_disable_safe_mode(): void
    {
        Config::set('parsedown.safe_mode', false);

        $expected = '<script />';
        $actual = parsedown('<script />');

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_enable_breaks(): void
    {
        Config::set('parsedown.enable_breaks', true);

        $expected = '<p><strong>Parsedown</strong> Test<br />' . "\n" . '<strong>Parsedown</strong> Test</p>';
        $actual = parsedown('**Parsedown** Test' . "\n" . '**Parsedown** Test');

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_disable_breaks(): void
    {
        Config::set('parsedown.enable_breaks', false);

        $expected = '<p><strong>Parsedown</strong> Test' . "\n" . '<strong>Parsedown</strong> Test</p>';
        $actual = parsedown('**Parsedown** Test' . "\n" . '**Parsedown** Test');

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_enable_escape_markup(): void
    {
        Config::set('parsedown.markup_escaped', true);

        $expected = '<p>' . htmlentities('<span>') . '<strong>Parsedown</strong> Test' . htmlentities('</span>') . '</p>';
        $actual = parsedown('<span>' . '**Parsedown** Test' . '</span>');

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_disable_escape_markup(): void
    {
        Config::set('parsedown.markup_escaped', false);

        $expected = '<p>' . htmlentities('<span>') . '<strong>Parsedown</strong> Test' . htmlentities('</span>') . '</p>';
        $actual = parsedown('<span>' . '**Parsedown** Test' . '</span>');

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_enable_link_urls(): void
    {
        Config::set('parsedown.link_urls', true);

        $expected = '<a href="' . $this->url . '">' . $this->url . '</a>';
        $actual = parsedown($this->url, true);

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_disable_link_urls(): void
    {
        Config::set('parsedown.link_urls', false);

        $expected = $this->url;
        $actual = parsedown($this->url, true);

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_enable_inline(): void
    {
        Config::set('parsedown.inline', true);

        $expected = '<strong>Parsedown</strong> Test';
        $actual = parsedown('**Parsedown** Test');

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_disable_inline(): void
    {
        Config::set('parsedown.inline', false);

        $expected = '<p><strong>Parsedown</strong> Test</p>';
        $actual = parsedown('**Parsedown** Test');

        $this->assertSame($expected, $actual);
    }
}
