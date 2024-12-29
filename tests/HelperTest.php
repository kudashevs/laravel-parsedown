<?php

namespace Tests;

use Parsedown;

/**
 * Class HelperTest
 * @package Tests
 */
class HelperTest extends TestCase
{
    public function testCanCastString(): void
    {
        $actual = parsedown($this->text);
        $expected = '<p><strong>Parsedown</strong> UnitTest</p>';

        $this->assertSame($expected, $actual);
    }

    public function testCanInlineString(): void
    {
        $actual = parsedown($this->text, true);
        $expected = '<strong>Parsedown</strong> UnitTest';

        $this->assertSame($expected, $actual);
    }

    public function testCanHandleNoArguments(): void
    {
        $actual = parsedown();
        $expected = Parsedown::class;

        $this->assertInstanceOf($expected, $actual);
    }

    public function testCanHandleNull(): void
    {
        $actual = parsedown(null);
        $expected = '';

        $this->assertSame($expected, $actual);
    }
}
