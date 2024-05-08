<?php
namespace Ludo237\Nanoid;

use Ludo237\Nanoid\Concerns\CoreInterface;
use Ludo237\Nanoid\Cores\SecureCore;

class Client
{
    private string $alphabet;
    private int $size;
    private CoreInterface $core;
    private const int DEFAULT_SIZE = 21;
    private const string DEFAULT_ALPHABET = '_0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-';

    public function __construct($alphabet = self::DEFAULT_ALPHABET)
    {
        $this->alphabet = $alphabet;
        $this->size = self::DEFAULT_SIZE;
        $this->core = new SecureCore();
    }

    public function alphabet(string $alphabet): self
    {
        $this->alphabet = $alphabet;

        return $this;
    }

    public function size(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function core(CoreInterface $core) : self
    {
        $this->core = $core;

        return $this;
    }

    /**
     * @throws \Random\RandomException
     */
    public function generate(): string
    {
        return $this->core->random($this->size, $this->alphabet);
    }
}
