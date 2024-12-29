<?php

declare(strict_types=1);

namespace Kudashevs\LaravelParsedown;

final class Parsedown
{
    private \Parsedown $parser;

    public function __construct()
    {
        $this->parser = new \Parsedown();
    }

    public function line(string $text): string
    {
        return $this->parser->line($text);
    }

    public function text(string $text)
    {
        return $this->parser->text($text);
    }
}
