<?php

namespace Ludo237\Nanoid\Tests\Unit;

use Ludo237\Nanoid\Cores\SecureCore;

describe('SecureCore', function () {
    it('should generate a random string', function () {
        $secureCore = new SecureCore();
        $string = $secureCore->random(10, 'abcdefgh');

        expect($string)
            ->toBeString()
            ->and(strlen($string))
            ->toBe(10)
        ;
    });
});
