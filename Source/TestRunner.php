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
     * Results will be outputted.
     *
     * @return void
     */
    public function run()
    {
        $_SERVER['argv'] = $this->getArguments();

        if (class_exists('IDE_PHPUnit_TextUI_Command')) {
            \IDE_PHPUnit_TextUI_Command::main();
        } else {
            \PHPUnit_TextUI_Command::main();
        }
    }
    
    /**
     * Returns the arguments compatible with phpunit cli as an array.
     *
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
