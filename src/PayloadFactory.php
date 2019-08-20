<?php
namespace RazonYang\JSend;

/**
 * MessageFactory is a factory that provides shortcuts to generate message.
 */
class PayloadFactory
{
    /**
     * Generates success payload.
     *
     * @param mixed $data
     *
     * @return MessageInterface
     */
    public static function success($data): PayloadInterface
    {
        return (new Payload())
            ->setStatus(Status::SUCCESS)
            ->setData($data);
    }

    /**
     * Generates fail payload.
     *
     * @param mixed $data
     *
     * @return MessageInterface
     */
    public static function fail($data): PayloadInterface
    {
        return (new Payload())
            ->setStatus(Status::FAIL)
            ->setData($data);
    }

    /**
     * Generates error payload.
     *
     * @param mixed $data
     *
     * @param string $message error message.
     * @param int    $code    error code.
     * @param mixed  $data    error data, i.e. stack traces.
     *
     * @return MessageInterface
     */
    public static function error(string $message, ?int $code = null, $data = null): PayloadInterface
    {
        $payload = (new Payload())
            ->setStatus(Status::ERROR)
            ->setMessage($message);
        if ($code !== null) {
            $payload->setCode($code);
        }
        if ($data !== null) {
            $payload->setData($data);
        }
        
        return $payload;
    }
}
