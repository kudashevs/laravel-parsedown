<?php

namespace Tests;

/**
 * Class DirectiveTest
 * @package Tests
 */
class DirectiveTest extends TestCase
{
    /** @test */
    public function it_can_parse_directive(): void
    {
        $compiler = $this->getCompiler();

        $actual = $compiler->compileString('@parsedown("' . $this->text . '")');
        $expected = '<?php echo parsedown("' . $this->text . '"); ?>';

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_parse_inline_directive(): void
    {
        $compiler = $this->getCompiler();

        $actual = $compiler->compileString('@parsedown("' . $this->text . ', true")');
        $expected = '<?php echo parsedown("' . $this->text . ', true"); ?>';

        $this->assertSame($expected, $actual);
    }
}
