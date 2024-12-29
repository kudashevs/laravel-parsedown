<?php

namespace Tests;

/**
 * Class DirectiveTest
 * @package Tests
 */
class DirectiveTest extends TestCase
{
    public function testCanParseDirective(): void
    {
        $compiler = $this->getCompiler();

        $actual = $compiler->compileString('@parsedown("' . $this->text . '")');
        $expected = '<?php echo parsedown("' . $this->text . '"); ?>';

        $this->assertSame($expected, $actual);
    }

    public function testCanParseInlineDirective(): void
    {
        $compiler = $this->getCompiler();

        $actual = $compiler->compileString('@parsedown("' . $this->text . ', true")');
        $expected = '<?php echo parsedown("' . $this->text . ', true"); ?>';

        $this->assertSame($expected, $actual);
    }
}
