<?php

namespace Dms\Common\Testing\Runner;

use Dms\Common\Testing\Runner\Printer\StreamingHtmlResultPrinter;

class BrowserTestRunner extends TestRunner
{
    protected function appendCustomArguments(array &$arguments)
    {
        $arguments[] = '--printer';
        $arguments[] = StreamingHtmlResultPrinter::class;
        
        if(isset($_GET['testsuite'])) {
            $arguments[] = '--testsuite';
            $arguments[] = $_GET['testsuite'];
        }
    }
}

