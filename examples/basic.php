<?php
require __DIR__.'/../vendor/autoload.php';

use Ludo237\Nanoid\Client;

$nano = new Client("0123456789abcdefghijklmnopqrstuvwxyz");
$size = 21;
printf("%s\n", str_repeat('-', 64));
$start = microtime(true);
random_bytes($size);
$end = microtime(true);
$delta = ($end - $start) * 1e3;
printf("Generate random bytes used: %.6f ms ...\n", $delta);

$id = $nano->generate();
printf("%s\n", str_repeat('-', 64));
printf("NanoId Unsecure Mode: %s\n", $id);
printf("%s\n", str_repeat('-', 64));

$id = $nano->generate();
printf("NanoId Secure Mode: %s\n", $id);
printf("%s\n", str_repeat('-', 64));
