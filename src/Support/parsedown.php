<?php

return [
    /**
     * Tells **Parsedown** if it should convert line breaks such as `\n` into `<br />` tags.
     *
     * @see https://github.com/erusev/parsedown/wiki/Usage
     */
    'breaks_enabled' => false,

    /**
     * Tells **Parsedown** whether it should process untrusted user-input.
     *
     * @see https://github.com/erusev/parsedown#security
     */
    'safe_mode' => true,

    /**
     * Tells **Parsedown** whether it should convert line breaks such as `\n` into `<br />` tags.
     *
     * @see https://github.com/erusev/parsedown/wiki/Usage
     */
    'enable_breaks' => false,

    /**
     * Tells **Parsedown** whether it should escape **HTML** in trusted input. This method isn't safe from XSS!
     *
     * @see https://github.com/erusev/parsedown#escaping-html
     */
    'escape_markup' => false,

    /**
     * Tells **Parsedown** if it should automatically convert urls into anchor tags.
     *
     * @see https://github.com/erusev/parsedown/wiki/Usage
     */
    'link_urls' => true,

    /**
     *  Tells the `parsedown()` helper and the `@parsedown` **Blade** directive whether the user input should be inline parsed by default.
     *
     * @see https://github.com/erusev/parsedown/wiki/Usage
     */
    'inline' => false,
];
