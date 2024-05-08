<?php

namespace Ludo237\Nanoid\Cores;

use Ludo237\Nanoid\Concerns\CoreInterface;

class SecureCore implements CoreInterface
{
    /**
     * @throws \Random\RandomException
     */
    public function random(int $size, string $alphabet): string
    {
        $len = strlen($alphabet);
        $mask = (2 << (int) (log($len - 1) / M_LN2)) - 1;
        $step = (int) ceil(1.6 * $mask * $size / $len);
        $id = '';
        while (true) {
            $bytes = unpack('C*', \random_bytes($step));
            foreach ($bytes as $byte) {
                $byte &= $mask;
                if (isset($alphabet[$byte])) {
                    $id .= $alphabet[$byte];
                    if (strlen($id) === $size) {
                        return $id;
                    }
                }
            }
        }
    }
}
