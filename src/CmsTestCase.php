<?php

namespace Dms\Common\Testing;

use PHPUnit\Framework\TestCase;
use DMS\PHPUnitExtensions\ArraySubset\ArraySubsetAsserts;

abstract class CmsTestCase extends TestCase
{
    use DmsAsserts;
    use ArraySubsetAsserts;
}
