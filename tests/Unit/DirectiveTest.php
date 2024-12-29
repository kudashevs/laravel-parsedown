<?php

namespace Kudashevs\LaravelParsedown\Tests\Unit;

use Illuminate\View\Compilers\BladeCompiler;
use Kudashevs\LaravelParsedown\Tests\TestCase;

class DirectiveTest extends TestCase
{
    /** @test */
    public function it_can_use_directive(): void
    {
        $compiler = $this->getCompiler();

        $expected = '<?php echo parsedown("**Parsedown** Test"); ?>';
        $actual = $compiler->compileString('@parsedown("**Parsedown** Test")');

        $this->assertSame($expected, $actual);
    }

    /** @test */
    public function it_can_use_directive_with_inline(): void
    {
        $compiler = $this->getCompiler();

        $expected = '<?php echo parsedown("**Parsedown** Test, true"); ?>';
        $actual = $compiler->compileString('@parsedown("**Parsedown** Test, true")');

        $this->assertSame($expected, $actual);
    }

    protected function getCompiler(): BladeCompiler
    {
        return $this->app->make(BladeCompiler::class);
    }
}
