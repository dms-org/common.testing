<?php

namespace IDDigital\CMS\Common\Testing;

class CLITestRunner extends TestRunner
{
    protected function getCustomArguments(array &$arguments)
    {
        $cliArguments = $_SERVER['argv'];
        
        //Remove script path argument
        unset($cliArguments[0]);
        
        $arguments = array_merge($arguments, $cliArguments);
    }
}

?>
