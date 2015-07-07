<?php

namespace Iddigital\Cms\Common\Testing;

class CmsTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @param callable $operation
     * @param string   $exception
     *
     * @return \Exception
     */
    public function assertThrows(callable $operation, $exception = \Exception::class, $message = 'Failed asserting that the operation throws an exception')
    {
        try {
            $operation();
            $this->fail($message);
        } catch (\Exception $e) {
            $this->assertInstanceOf($exception, $e);
            return $e;
        }
    }
}
