<?php

namespace Dms\Common\Testing\Runner;

class CliTestRunner extends TestRunner
{
    protected function appendCustomArguments(array &$arguments)
    {
        $cliArguments = $_SERVER['argv'];
        
        //Remove script path argument
        unset($cliArguments[0]);
        
        $arguments = array_merge($arguments, $cliArguments);
    }
}
