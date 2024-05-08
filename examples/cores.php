<?php

use Ludo237\Nanoid\Client;
use Ludo237\Nanoid\Cores\UnsecureCore;

require __DIR__.'/../vendor/autoload.php';

$nano = new Client("0123456789abcdefghijklmnopqrstuvwxyz");

$nanoId = $nano->generate();
printf("%s\n", str_repeat('-', 64));
printf("Default nano ID: %s\n", $nanoId);
printf("%s\n", str_repeat('-', 64));

$dummyId = $nano->core(new UnsecureCore())->generate();
printf("Custom core nano ID: %s\n", $dummyId);
printf("%s\n", str_repeat('-', 64));
