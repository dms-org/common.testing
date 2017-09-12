<?php

namespace Dms\Common\Testing\Runner\Printer;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestFailure;
use PHPUnit\Framework\TestResult;
use PHPUnit\Framework\TestSuite;
use PHPUnit\TextUI\ResultPrinter;

class StreamingHtmlResultPrinter extends ResultPrinter
{
    const PRINTER_CLASS = __CLASS__;
    const BUFFER_PADDING = 2048;
    const TEST_RESULT_COLUMNS = 150;
    
    public function __construct($out = NULL, $verbose = FALSE, $colors = FALSE, $debug = FALSE)
    {
        parent::__construct($out, $verbose, $colors, $debug);
        $this->autoFlush = true;
    }
    
    public function startTestSuite(TestSuite $suite)
    {
        parent::startTestSuite($suite);
        $this->maxColumn = self::TEST_RESULT_COLUMNS;
    }
    
    public function write($buffer)
    {
        $originalBuffer = $buffer;
        $buffer = str_replace("\n", '<br>', $originalBuffer);
        
        //Force browser to load on new line
        if($buffer !== $originalBuffer
                && ($length = strlen($buffer)) < self::BUFFER_PADDING) {
            $padding = str_repeat(' ', self::BUFFER_PADDING - $length);
            echo "<!--$padding-->";
        }
    
        echo $buffer;

        $this->incrementalFlush();
    }
    
    
    public function addError(Test $test, \Exception $e, $time)
    {
        echo '<span style="color:red">';
        parent::addError($test, $e, $time);
        echo '</span>';
    }
    
    public function addFailure(Test $test, AssertionFailedError $e, $time)
    {
        echo '<span style="color:red">';
        parent::addFailure($test, $e, $time);
        echo '</span>';
    }
    
    protected function printHeader()
    {
        echo '<span class="stats">';
        parent::printHeader();
        echo '</span>';
    }
    
    protected function printDefect(TestFailure $defect, $count)
    {
        echo '<span class="defect">';
        parent::printDefect($defect, $count);
        echo '</span>';
    }
    
    protected function printFooter(TestResult $result)
    {
        echo '<span class="result">';
        parent::printFooter($result);
        echo '</span>';
    }
}