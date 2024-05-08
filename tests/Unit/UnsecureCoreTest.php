<?php

namespace Ludo237\Nanoid\Tests\Unit;

use Ludo237\Nanoid\Cores\UnsecureCore;

describe('UnsecureCore', function () {
    it('should generate a random string', function () {
        $secureCore = new UnsecureCore();
        $string = $secureCore->random(10, 'abcdefgh');

        expect($string)
            ->toBeString()
            ->and(strlen($string))
            ->toBe(10)
        ;
    });
});
