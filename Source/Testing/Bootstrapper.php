<?php

namespace IDDigital\CMS\Common\Testing;

abstract class Bootstrapper
{
    const DEFAULT_TEMPLATE = 'template.php';
    
    private function __construct()
    {
        
    }
    
    public static function run(
            $namespace,
            $directory,
            $configurationPath,
            $timeLimit = null,
            $template = self::DEFAULT_TEMPLATE)
    {
        $title = $namespace . ': Automated regression test suite';
        
        $projectAutoLoaderPath = $directory . '/../vendor/autoload.php';
        $dependencyAutoLoaderPath = $directory . '/../../../../autoload.php';

        if (file_exists($projectAutoLoaderPath)) {
            $composerAutoLoader = require $projectAutoLoaderPath;
        } elseif (file_exists($dependencyAutoLoaderPath)) {
            $composerAutoLoader = require $dependencyAutoLoaderPath;
        } else {
            throw new \Exception('Cannot load tests: please load via composer');
        }
        
        $composerAutoLoader->addPsr4($namespace . '\\', $directory);

        error_reporting(-1);
        ini_set('display_errors', 'On');
        set_time_limit($timeLimit ?: 0);
        
        $fullConfigurationPath = $directory . $configurationPath;
        $testRunner = new TestRunner($fullConfigurationPath);
        
        self::runTests($template, $title, $testRunner);
    }
    
    private static function runTests($template, $title, TestRunner $runner)
    {
        require $template;
    }
}

?>
