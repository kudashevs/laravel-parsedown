<?php

/**
 * @param string $text
 * @param bool $inline
 * @return string
 */
function parsedown(string $text, ?bool $inline = null)
{
    /**
     * @var Parsedown $parser
     */
    $parser = app('parsedown');

    if (is_null($inline)) {
        $inline = config('parsedown.inline');
    }

    if ($inline) {
        return $parser->line($text);
    }

    return $parser->text($text);
}
