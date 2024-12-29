<?php

namespace Kudashevs\LaravelParsedown\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Kudashevs\LaravelParsedown\Parsedown;

/**
 * Class ParsedownServiceProvider
 * @package App\Providers
 */
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
        $this->app->singleton(Parsedown::class, function () {
            $parsedown = $this->makeParsedown();

            $parsedown->setSafeMode(
                Config::get('parsedown.safe_mode')
            );

            $parsedown->setBreaksEnabled(
                Config::get('parsedown.enable_breaks')
            );

            $parsedown->setMarkupEscaped(
                Config::get('parsedown.escape_markup')
            );

            $parsedown->setUrlsLinked(
                Config::get('parsedown.link_urls')
            );

            return $parsedown;
        });
        $this->app->alias(Parsedown::class, 'parsedown');

        $this->mergeConfigFrom(__DIR__ . '/../Support/parsedown.php', 'parsedown');
    }

    protected function makeParsedown(): Parsedown
    {
        return new Parsedown([
            'enable_extra' => config('parsedown.enable_extra'),
        ]);
    }
}
