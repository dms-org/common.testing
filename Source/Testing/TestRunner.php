<?php

namespace IDDigital\CMS\Common\Testing;

class TestRunner
{
    /**
     * The path to the project's xml configuration file.
     * 
     * @var string
     */
    private $configurationPath;
    
    public function __construct($configurationPath)
    {
        $this->configurationPath = $configurationPath;
    }
    
    /**
     * Run the test suite.
     * Results will be outputed.
     * 
     * @return void
     */
    public function run()
    {
        $argv = $_SERVER['argv'] = $this->loadArguments($_GET);
        \PHPUnit_TextUI_Command::main();
    }
    
    /**
     * Returns the arguments compatible with phpunit cli as an array.
     * 
     * @param array $loaderArguments
     * @return array
     */
    private function loadArguments(array $loaderArguments)
    {
        $arguments = [
            '--configuration', $this->configurationPath,
            '--printer', StreamingHTMLResultPrinter::PRINTER_CLASS,
        ];

        if(isset($loaderArguments['testsuite'])) {
            $arguments[] = '--testsuite';
            $arguments[] = $loaderArguments['testsuite'];
        }

        return $arguments;
    }
}

?>
