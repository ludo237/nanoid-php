<?php

namespace Ludo237\Nanoid\Tests\Unit;

use Ludo237\Nanoid\Client;
use Ludo237\Nanoid\Concerns\CoreInterface;

describe('Client', function () {
    it('can be constructed', function () {
        $client = new Client();
        expect($client)->toBeInstanceOf(Client::class);
    });

    it('generates a nano id', function () {
        $client = new Client();
        $id = $client->generate();

        expect($id)
            ->toBeString()
            ->and(strlen($id))
            ->toBe(21)
        ;
    });

    it('accepts custom size', function () {
        $client = new Client();
        $id = $client->size(10)->generate();

        expect($id)
            ->toBeString()
            ->and(strlen($id))
            ->toBe(10)
        ;
    });

    it('accepts custom alphabet', function () {
        $client = new Client();
        $client->alphabet('1234567890');
        $id = $client->generate();

        expect(intval($id))->toBeInt();
    });

    it('accepts custom core', function () {
        $core = new class() implements CoreInterface {
            public function random(int $size, string $alphabet): string
            {
                return 4;
            }
        };

        $client = new Client();
        $client->core($core);
        $id = $client->generate();

        expect($id)->toBe('4');
    });
});
