<?php

namespace Iddigital\Cms\Common\Testing;

abstract class TestRunner
{
    /**
     * The path to the project's xml configuration file.
     * 
     * @var string
     */
    protected $configurationPath;
    
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
        $_SERVER['argv'] = $this->getArguments();
        \PHPUnit_TextUI_Command::main();
    }
    
    /**
     * Returns the arguments compatible with phpunit cli as an array.
     * 
     * @param array $loaderArguments
     * @return array
     */
    private function getArguments()
    {
        $arguments = [
            '--configuration', $this->configurationPath,
        ];
        
        $this->getCustomArguments($arguments);

        return $arguments;
    }
    
    protected function getCustomArguments(array &$arguments)
    {
        
    }
}
