<?php

namespace Ludo237\Nanoid\Cores;

use Ludo237\Nanoid\Concerns\CoreInterface;
use Random\RandomException;

class UppercaseCore implements CoreInterface
{
    /**
     * @throws RandomException
     */
    public function random(int $size, string $alphabet): string
    {
        $len = strlen($alphabet);
        $mask = (2 << (int) (log($len - 1) / M_LN2)) - 1;

        /** @var int<1, max> $step */
        $step = (int) ceil(1.6 * $mask * $size / $len);
        $id = '';
        while (true) {
            /** @var int[] $bytes */
            $bytes = unpack('C*', \random_bytes($step));
            foreach ($bytes as $byte) {
                $byte &= $mask;
                if (isset($alphabet[$byte])) {
                    $id .= $alphabet[$byte];
                    if (strlen($id) === $size) {
                        return strtoupper($id);
                    }
                }
            }
        }
    }
}
