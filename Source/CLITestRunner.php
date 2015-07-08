<?php

namespace Iddigital\Cms\Common\Testing;

class CliTestRunner extends TestRunner
{
    protected function getCustomArguments(array &$arguments)
    {
        $cliArguments = $_SERVER['argv'];
        
        //Remove script path argument
        unset($cliArguments[0]);
        
        $arguments = array_merge($arguments, $cliArguments);
    }
}
