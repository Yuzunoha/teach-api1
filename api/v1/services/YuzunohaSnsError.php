<?php

class YuzunohaSnsError
{
    public $msg;
    public $statusCode;
    public function __construct($msg, $statusCode)
    {
        $this->msg = $msg;
        $this->statusCode = $statusCode;
    }
    public function getBody()
    {
        return [
            'error' => $this->msg,
        ];
    }
}
