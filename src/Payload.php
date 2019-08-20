<?php
namespace RazonYang\JSend;

class Payload implements PayloadInterface
{
    private $status;

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): PayloadInterface
    {
        $this->status = $status;
        return $this;
    }

    private $data;

    public function getData()
    {
        return $this->data;
    }

    public function setData($data): PayloadInterface
    {
        $this->data = $data;
        return $this;
    }

    private $message;

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): PayloadInterface
    {
        $this->message = $message;
        return $this;
    }

    private $code;

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): PayloadInterface
    {
        $this->code = $code;
        return $this;
    }

    public function toArray(): array
    {
        if ($this->status === Status::SUCCESS || $this->status === Status::FAIL) {
            return [
                'status' => $this->status,
                'data' => $this->data
            ];
        }

        $payload = [
            'status' => $this->status,
            'message' => $this->message
        ];
        if ($this->code !== null) {
            $payload['code'] = $this->code;
        }
        if ($this->data !== null) {
            $payload['data'] = $this->data;
        }

        return $payload;
    }

    public function toString(?int $options = null): string
    {
        $options = $options ?? (JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return json_encode($this->toArray(), $options);
    }

    public function __toString()
    {
        return $this->toString();
    }
}
