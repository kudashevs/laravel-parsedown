<?php

namespace Kudashevs\LaravelParsedown\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Kudashevs\LaravelParsedown\Parsedown;

class ParsedownServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->compiler()->directive('parsedown', function (string $expression = '') {
            return "<?php echo parsedown($expression); ?>";
        });

        $this->publishes([
            __DIR__ . '/../Support/parsedown.php' => config_path('parsedown.php'),
        ]);
    }

    protected function compiler(): BladeCompiler
    {
        return app('view')
            ->getEngineResolver()
            ->resolve('blade')
            ->getCompiler();
    }

    public function register(): void
    {
        $this->app->singleton(Parsedown::class, fn(Application $app) => $this->makeParsedown($app));
        $this->app->alias(Parsedown::class, 'parsedown');

        $this->mergeConfigFrom(__DIR__ . '/../Support/parsedown.php', 'parsedown');
    }

    protected function makeParsedown(Application $app): Parsedown
    {
        $parsedown = new Parsedown([
            'enable_extra' => $app['config']->get('parsedown.enable_extra'),
        ]);

        $parsedown->setSafeMode(
            $app['config']->get('parsedown.safe_mode')
        );

        $parsedown->setBreaksEnabled(
            $app['config']->get('parsedown.enable_breaks')
        );

        $parsedown->setMarkupEscaped(
            $app['config']->get('parsedown.escape_markup')
        );

        $parsedown->setUrlsLinked(
            $app['config']->get('parsedown.link_urls')
        );

        return $parsedown;
    }
}
