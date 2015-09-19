<?php

namespace Iddigital\Cms\Common\Testing;

/**
 * Adds the appropriate classes to the phpunit blacklist
 * so they do not show up in exception traces.
 *
 * @author Elliot Levin <elliotlevin@hotmail.com>
 */
abstract class PhpunitBlacklist
{
    /**
     * @return void
     */
    public static function load()
    {
        \PHPUnit_Util_Blacklist::$blacklistedClassNames += [
            CmsTestCase::class => 2
        ];
    }
}

