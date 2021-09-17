<?php

namespace Lacuna\Amplia;

/**
 * Class RegisterKeyRequest
 * @package Lacuna\Amplia
 *
 * @property $name string
 * @property $parameters KeyParametersModel
 */
class RegisterKeyRequest
{
    /**
     * @private
     * @var string
     */
    private $_name;

    /**
     * @private
     * @var KeyParametersModel
     */
    private $_parameters;

    /**
     * RegisterKeyRequest constructor.
     * @param mixed $model
     */
    public function __construct($model = null)
    {
        if (isset($model)) {
            if (isset($model->name)) {
                $this->_name = $model->name;
            }
            if (isset($model->parameters)) {
                $this->_parameters = new KeyParametersModel($model->parameters);
            }
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
    public function getParameters()
    {
        return $this->_parameters;
    }

    /**
     * @param string $cpf
     */
    public function setParameters($parameters)
    {
        $this->_parameters = $parameters;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'name':
                return $this->getName();
            case 'parameters':
                return $this->getParameters();
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
            case 'parameters':
                return isset($this->_parameters);
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
            case 'parameters':
                $this->setParameters($value);
                break;
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
        }
    }

    public function toModel()
    {
        if (!isset($this->_name)) {
            throw new \UnexpectedValueException('The "name" was not set.');
        }
        if (!isset($this->_parameters)) {
            throw new \UnexpectedValueException('The "parameters" was not set.');
        }
        $model['name'] = $this->_name;
        if (isset($this->_parameters)) {
            $model['parameters'] = $this->_parameters->toModel();
        }
        return $model;
    }
}