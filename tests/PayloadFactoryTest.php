<?php
namespace RazonYang\Jsend\Tests;

use PHPUnit\Framework\TestCase;
use RazonYang\JSend\Payload;
use RazonYang\JSend\PayloadFactory;
use RazonYang\JSend\PayloadInterface;
use RazonYang\JSend\Status;

class PayloadFactoryTest extends TestCase
{
    /**
     * @dataProvider dataProviderSuccess
     */
    public function testSuccess($data): void
    {
        $payload = PayloadFactory::success($data);
        $this->assertSame(Status::SUCCESS, $payload->getStatus());
        $this->assertSame($data, $payload->getData());
    }

    public function dataProviderSuccess(): array
    {
        return [
            [null],
            ['foo'],
            [['id' => 1, 'name' => 'foo']],
        ];
    }

    /**
     * @dataProvider dataProviderFail
     */
    public function testFail($data): void
    {
        $payload = PayloadFactory::fail($data);
        $this->assertSame(Status::FAIL, $payload->getStatus());
        $this->assertSame($data, $payload->getData());
    }

    public function dataProviderFail(): array
    {
        return [
            [null],
            ['foo'],
            [['id' => 1, 'name' => 'foo']],
        ];
    }

    /**
     * @dataProvider dataProviderError
     */
    public function testError(string $message, ?int $code = null, $data = null): void
    {
        $payload = PayloadFactory::error($message, $code, $data);
        $this->assertSame(Status::ERROR, $payload->getStatus());
        $this->assertSame($message, $payload->getMessage());
        if ($code !== null) {
            $this->assertSame($code, $payload->getCode());
        }
        if ($data !== null) {
            $this->assertSame($data, $payload->getData());
        }
    }

    public function dataProviderError(): array
    {
        return [
            ['error'],
            ['error with code', 500],
            ['error with code and data', 401, 'data'],
        ];
    }
}
