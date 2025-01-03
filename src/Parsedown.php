<?php

declare(strict_types=1);

namespace Kudashevs\LaravelParsedown;

final class Parsedown
{
    private \Parsedown $parser;

    public function __construct(array $options = [])
    {
        $this->initParser($options);
    }

    private function initParser(array $options)
    {
        $this->parser = (isset($options['enable_extra']) && $options['enable_extra'] === true)
            ? new \ParsedownExtra()
            : new \Parsedown();
    }

    public function line(string $text): string
    {
        return $this->parser->line($text);
    }

    public function text(string $text)
    {
        return $this->parser->text($text);
    }

    public function setSafeMode(bool $safeMode): void
    {
        $this->parser->setSafeMode($safeMode);
    }

    public function setBreaksEnabled(bool $enableBreaks): void
    {
        $this->parser->setBreaksEnabled($enableBreaks);
    }

    public function setMarkupEscaped(bool $escapeMakrup): void
    {
        $this->parser->setMarkupEscaped($escapeMakrup);
    }

    public function setUrlsLinked(bool $linkUrls): void
    {
        $this->parser->setUrlsLinked($linkUrls);
    }
}
