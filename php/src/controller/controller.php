<?php

namespace Src\Controller;

use Src\Printer\IPrinter;

class Controller
{
    public function __construct(IPrinter $printer)
    {
        $this->printer = $printer;
    }

    /**
     * IPrinterの実装が文字列を出力する
     */
    public function printSomething()
    {
        $this->printer->print();
    }
}