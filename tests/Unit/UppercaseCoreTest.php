<?php

namespace Ludo237\Nanoid\Tests\Unit;

use Ludo237\Nanoid\Client;
use Ludo237\Nanoid\Cores\UppercaseCore;

describe('UppercaseCore', function () {
    it('should generate a random string', function () {
        $core = new UppercaseCore();
        $client = new Client();
        $client->alphabet('abcdefghijklmnopqrstuvwxyz');
        $client->core($core);

        $id = $client->generate();

        expect($id)
            ->toBeString()
            ->and($id)
            ->toBeUppercase()
        ;
    });
});
