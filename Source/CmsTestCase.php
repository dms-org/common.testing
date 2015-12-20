<?php

namespace Dms\Common\Testing;

abstract class CmsTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @param callable $operation
     * @param string   $exception
     * @param string   $message
     *
     * @return \Exception|null
     * @throws \Exception
     */
    public function assertThrows(callable $operation, $exception = \Exception::class, $message = 'Failed asserting that the operation throws an exception')
    {
        $thrownException = true;

        try {
            $operation();
            $thrownException = false;
        } catch (\Exception $e) {
            if (strpos(get_class($e), 'PHPUnit_Framework') === 0) {
                throw $e;
            }

            $this->assertInstanceOf($exception, $e);
            return $e;
        }

        if (!$thrownException) {
            $this->fail($message);
        }

        return null;
    }
}
