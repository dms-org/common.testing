<?php

namespace Dms\Common\Testing\Runner;

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
     * Runs the test suite.
     *
     * @return void
     */
    public function run()
    {
        $_SERVER['argv'] = $this->getArguments();

        // If this class is defined, the test suite is
        // being run through the PhpStorm IDE. This allows
        // the IDE to capture the test output so we should
        // run it through that class.
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
        
        $this->appendCustomArguments($arguments);

        return $arguments;
    }
    
    abstract protected function appendCustomArguments(array &$arguments);
}
