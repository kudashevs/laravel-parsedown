<?php

/**
 * @param string $value
 * @param bool $inline
 * @return string
 */
function parsedown(string $value, ?bool $inline = null)
{
    /**
     * @var Parsedown $parser
     */
    $parser = app('parsedown');

    if (is_null($inline)) {
        $inline = config('parsedown.inline');
    }

    if ($inline) {
        return $parser->line($value);
    }

    return $parser->text($value);
}
