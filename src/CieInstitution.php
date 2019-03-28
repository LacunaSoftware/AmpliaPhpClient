<?php

namespace Lacuna\Amplia;


class CieInstitution
{
    private $_name;
    private $_city;
    private $_state;

    public function __construct($model = null)
    {
        if (isset($model)) {
            $this->_name = $model->name ?: null;
            $this->_city = $model->city ?: null;
            $this->_state = $model->state ?: null;
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->_city = $city;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'name':
                return $this->getName();
            case 'city':
                return $this->getCity();
            case 'state':
                return $this->getState();
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return null;
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'name':
                return isset($this->_name);
            case 'city':
                return isset($this->_city);
            case 'state':
                return isset($this->_state);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return false;
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'name':
                $this->setName($value);
                break;
            case 'city':
                $this->setCity($value);
                break;
            case 'state':
                $this->setState($value);
                break;
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
        }
    }

    public function toModel()
    {
        if (!isset($this->_name)) {
            throw new \UnexpectedValueException('The "name" field was not set.');
        }
        if (!isset($this->_city)) {
            throw new \UnexpectedValueException('The "city" field was not set.');
        }
        if (!isset($this->_state)) {
            throw new \UnexpectedValueException('The "state" field was not set.');
        }

        return [
            'name' => $this->_name,
            'city' => $this->_city,
            'state' => $this->_state
        ];
    }
}