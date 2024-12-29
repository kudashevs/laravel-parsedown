<?php

namespace Kudashevs\LaravelParsedown\Tests;

use Illuminate\View\Compilers\BladeCompiler;

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

    protected function getCompiler(): BladeCompiler
    {
        return $this->app->make(BladeCompiler::class);
    }
}
