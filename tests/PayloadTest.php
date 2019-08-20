<?php
namespace RazonYang\Jsend\Tests;

use PHPUnit\Framework\TestCase;
use RazonYang\JSend\Payload;
use RazonYang\JSend\PayloadInterface;
use RazonYang\JSend\Status;

class PayloadTest extends TestCase
{
    /**
     * @dataProvider dataProviderSetUp
     */
    public function testSetUp(string $status, $data = null, ?string $message = null, ?int $code = null): void
    {
        $payload = new Payload();

        $this->assertInstanceOf(PayloadInterface::class, $payload->setStatus($status));
        if ($data !== null) {
            $this->assertInstanceOf(PayloadInterface::class, $payload->setData($data));
        }
        if ($message !== null) {
            $this->assertInstanceOf(PayloadInterface::class, $payload->setMessage($message));
        }
        if ($code !== null) {
            $this->assertInstanceOf(PayloadInterface::class, $payload->setCode($code));
        }


        $arr = $payload->toArray();
        $json = $payload->toString();
        $this->assertSame($arr, json_decode($json, true));
        $this->assertSame($json, strval($payload));
        // status
        $this->assertSame($status, $payload->getStatus());
        $this->assertSame($status, $arr['status']);

        if ($data !== null) {
            $this->assertSame($data, $payload->getData());
            $this->assertSame($data, $arr['data']);
        }
        if ($message !== null) {
            $this->assertSame($message, $payload->getMessage());
            $this->assertSame($message, $arr['message']);
        }
        if ($code !== null) {
            $this->assertSame($code, $payload->getCode());
            $this->assertSame($code, $arr['code']);
        }
    }

    public function dataProviderSetUp(): array
    {
        return [
            [Status::SUCCESS, ['id' => 1, 'name' => 'foo']],
            [Status::FAIL, ['password' => 'password is incorrect']],
            [Status::ERROR, null, '500 Internal Error'],
            [Status::ERROR, ['traces' => 'stack traces'], 'Unauthorized', 401],
        ];
    }
}
