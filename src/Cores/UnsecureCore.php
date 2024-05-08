<?php
namespace Ludo237\Nanoid\Cores;

use Ludo237\Nanoid\Concerns\CoreInterface;

class UnsecureCore implements CoreInterface
{
    public function random(int $size, string $alphabet): string
    {
        $id = '';
        while (1 <= $size--) {
            $rand = mt_rand() / (mt_getrandmax() + 1);
            $id .= $alphabet[intval($rand * strlen($alphabet))];
        }

        return $id;
    }
}
