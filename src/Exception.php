<?php
namespace RazonYang\JSend;

class Exception extends \Exception
{
    /**
     * @var mixed $data error data.
     */
    private $data;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @var string            $message
     * @var int               $code
     * @var mixed             $data
     * @param null|\Throwable $previous
     */
    public function __construct($message = '', $code = 0, $data = null, $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->data = $data;
    }
}
