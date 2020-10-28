<?php

namespace Dms\Common\Testing;

use PHPUnit\Util\ExcludeList;

/**
 * Adds the appropriate classes to the phpunit exclude list
 * so they do not show up in exception traces.
 *
 * @author Elliot Levin <elliotlevin@hotmail.com>
 */
abstract class PhpunitExcludeList
{
    /**
     * @return void
     */
    public static function load()
    {
        ExcludeList::addDirectory(__DIR__);

        if (class_exists('Dms\Core\Exception\BaseException')) {
            ExcludeList::addDirectory(dirname((new \ReflectionClass('Dms\Core\Exception\BaseException'))->getFileName()));
        }
    }
}

