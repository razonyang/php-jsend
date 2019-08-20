<?php
namespace RazonYang\JSend;

interface PayloadInterface
{
    /**
     * Returns a string that represents success, fail or error.
     *
     * @return string
     */
    public function getStatus(): string;

    /**
     * Sets status.
     *
     * @param string $status
     *
     * @return self
     */
    public function setStatus(string $status): self;

    /**
     * Returns data.
     *
     * @return mixed
     */
    public function getData();

    /**
     * Sets data.
     *
     * @param mixed $data
     *
     * @return self
     */
    public function setData($data): self;

    /**
     * Returns error message.
     *
     * @return null|string
     */
    public function getMessage(): ?string;

    /**
     * Sets message.
     *
     * @param string $message
     *
     * @return self
     */
    public function setMessage(string $message): self;

    /**
     * Returns error code.
     *
     * @return null|int
     */
    public function getCode(): ?int;

    /**
     * Sets error code.
     *
     * @param int $code
     *
     * @return self
     */
    public function setCode(int $code): self;

    /**
     * Returns an array represents the payload.
     *
     * @return array
     */
    public function toArray(): array;

    /**
     * Returns a string represents the payload.
     *
     * @param null|int json_encode $options.
     *
     * @return string
     */
    public function toString(?int $options = null): string;
}
