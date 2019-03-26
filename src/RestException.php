<?php

namespace Lacuna\Amplia;


class RestException extends \Exception
{
    private $_verb;
    private $_url;

    public function __construct($message, $verb, $url, \Exception $previous = null)
    {
        parent::__construct($message, 0, $previous);
        $this->_verb = $verb;
        $this->_url = $url;
    }

    /**
     * @return mixed
     */
    public function getVerb()
    {
        return $this->_verb;
    }

    /**
     * @param mixed $verb
     */
    public function setVerb($verb)
    {
        $this->_verb = $verb;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->_url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->_url = $url;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'verb':
                return $this->getVerb();
            case 'url':
                return $this->getUrl();
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return null;
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'verb':
                return isset($this->_verb);
            case 'url':
                return isset($this->_url);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return false;
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'verb':
                $this->setVerb($value);
                break;
            case 'url':
                $this->setUrl($value);
                break;
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
        }
    }
}