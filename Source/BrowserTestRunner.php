<?php

namespace Iddigital\Cms\Common\Testing;

class BrowserTestRunner extends TestRunner
{
    protected function getCustomArguments(array &$arguments)
    {
        $arguments[] = '--printer';
        $arguments[] = StreamingHTMLResultPrinter::PRINTER_CLASS;
        
        if(isset($_GET['testsuite'])) {
            $arguments[] = '--testsuite';
            $arguments[] = $_GET['testsuite'];
        }
    }
}

