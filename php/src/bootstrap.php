<?php

use Src\Container\Container;
use Src\Printer\IPrinter;
use Src\Printer\HogePrinter;
use Src\Printer\PiyoPrinter;

$container = Container::createInstance();

$container->bind(IPrinter::class, HogePrinter::class);
