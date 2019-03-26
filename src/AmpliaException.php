<?php

namespace Lacuna\Amplia;


class AmpliaException extends RestException
{
    private $_statusCode;
    private $_errorMessage;

    public function __construct($verb, $url, $model, \Exception $previous = null)
    {
        $message = "Amplia API error {$model->code}: {$model->message}";
        parent::__construct($message, $verb, $url, $previous);
        $this->_statusCode = $model->code;
        $this->_errorMessage = $model->message;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->_statusCode;
    }

    /**
     * @param mixed $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->_statusCode = $statusCode;
    }

    /**
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->_errorMessage;
    }

    /**
     * @param mixed $errorMessage
     */
    public function setErrorMessage($errorMessage)
    {
        $this->_errorMessage = $errorMessage;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'statusCode':
                return $this->getStatusCode();
            case 'errorMessage':
                return $this->getErrorMessage();
            default:
                return parent::__get($prop);
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'statusCode':
                return isset($this->_statusCode);
            case 'errorMessage':
                return isset($this->_errorMessage);
            default:
                return parent::__isset($prop);
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'statusCode':
                $this->setStatusCode($value);
                break;
            case 'errorMessage':
                $this->setErrorMessage($value);
                break;
            default:
                parent::__set($prop, $value);
        }
    }
}