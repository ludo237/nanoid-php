<?php

namespace Ludo237\Nanoid\Concerns;

interface CoreInterface
{
    /**
     * Secure random string generator with custom alphabet.
     * Alphabet must contain 256 symbols or less. Otherwise, the generator
     * will not be secure.
     *
     * @see https://github.com/ai/nanoid/blob/master/async/index.browser.js#L4
     */
    public function random(int $size, string $alphabet): string;
}
