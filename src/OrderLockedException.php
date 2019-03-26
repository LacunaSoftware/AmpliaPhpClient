<?php

namespace Lacuna\Amplia;


class OrderLockedException extends RestException
{
    public function __construct($verb, $url, $message, $previous = null)
    {
        parent::__construct($message, $verb, $url, $previous);
    }
}