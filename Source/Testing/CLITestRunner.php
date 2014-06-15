<?php

namespace IDDigital\CMS\Common\Testing;

class CLITestRunner extends TestRunner
{
    protected function getCustomArguments(array &$arguments)
    {
        $arguments = array_merge($arguments, $_SERVER['argv']);
    }
}

?>
