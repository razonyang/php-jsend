<?php
namespace RazonYang\Yii2\JSend\Tests;

use PHPUnit\Framework\TestCase;
use RazonYang\JSend\Exception;

class ExceptionTest extends TestCase
{
    /**
     * @dataProvider dataProviderSetUp
     */
    public function testSetUp($message, $code, $data = null, $previous = null): void
    {
        $e = new Exception($message, $code, $data, $previous);
        $this->assertSame($message, $e->getMessage());
        $this->assertSame($code, $e->getCode());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame($data, $e->getData());
    }

    public function dataProviderSetUp(): array
    {
        return [
            ['foo', 0, null, null],
            ['bar', 1, 'fuzz', new \Exception()],
        ];
    }
}
