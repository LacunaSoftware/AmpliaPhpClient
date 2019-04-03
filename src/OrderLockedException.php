<?php

namespace Lacuna\Amplia;

/**
 * Class OrderLockedException
 * @package Lacuna\Amplia
 */
class OrderLockedException extends RestException
{
    /**
     * OrderLockedException constructor.
     *
     * @param $verb
     * @param $url
     * @param $message
     * @param \Exception|null $previous
     */
    public function __construct($verb, $url, $message, \Exception $previous = null)
    {
        parent::__construct($message, $verb, $url, $previous);
    }
}