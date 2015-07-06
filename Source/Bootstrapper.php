<?php

namespace Iddigital\Cms\Common\Testing;

abstract class Bootstrapper
{
    private static $template = 'template.php';
    
    private function __construct()
    {
        
    }
    
    public static function run(
            $namespace,
            $directory,
            $configurationPath,
            $timeLimit = null)
    {
        error_reporting(-1);
        ini_set('display_errors', 'On');
        set_time_limit($timeLimit ?: 0);
        
        $fullConfigurationPath = $directory . DIRECTORY_SEPARATOR . $configurationPath;
        
        if(PHP_SAPI === 'cli') {
            self::runForCLI($namespace, $fullConfigurationPath);
        } else {
            self::runForBrowser($namespace, $fullConfigurationPath);
        }
    }
    
    public static function runForCLI(
            $namespace,
            $fullConfigurationPath)
    {
        $testRunner = new CLITestRunner($fullConfigurationPath);
        
        $testRunner->run();
    }
    
    public static function runForBrowser(
            $namespace,
            $fullConfigurationPath)
    {
        $title = $namespace . ': Automated regression test suite';
        $testRunner = new BrowserTestRunner($fullConfigurationPath);
        
        self::loadTestTemplate(self::$template, $title, $testRunner);
    }
    
    private static function loadTestTemplate($template, $title, TestRunner $runner)
    {
        require $template;
    }
    
    public static function setBrowserTemplate($path)
    {
        self::$template = $path;
    }
}

?>
