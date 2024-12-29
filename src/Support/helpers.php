<?php

/**
 * @param string $text
 * @param bool $inline
 * @return string
 */
function parsedown(string $text, ?bool $inline = null): string
{
    if (is_null($inline)) {
        $inline = config('parsedown.inline');
    }

    /**
     * @var Parsedown $parser
     */
    $parser = app('parsedown');

    if ($inline) {
        return $parser->line($text);
    }

    return $parser->text($text);
}
