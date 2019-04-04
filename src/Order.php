<?php

namespace Lacuna\Amplia;

/**
 * Class Order
 * @package Lacuna\Amplia
 *
 * @property $parameters CertificateParameters
 */
class Order extends BaseOrder
{
    /**
     * @private
     * @var CertificateParameters
     */
    private $_parameters;

    /**
     * Order constructor.
     *
     * @param mixed $model
     */
    public function __construct($model = null)
    {
        parent::__construct($model);
        if (isset($model)) {
            if (isset($model->parameters)) {
                $this->_parameters = CertificateParameters::decode($model->parameters);
            }
        }
    }

    /**
     * @return CertificateParameters
     */
    public function getParameters()
    {
        return $this->_parameters;
    }

    /**
     * @param CertificateParameters $parameters
     */
    public function setParameters($parameters)
    {
        $this->_parameters = $parameters;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'parameters':
                return $this->getParameters();
            default:
                return parent::__get($prop);
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'parameters':
                return isset($this->_parameters);
            default:
                return parent::__isset($prop);
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'parameters':
                $this->setParameters($value);
                break;
            default:
                parent::__set($prop, $value);
        }
    }

    public function toModel()
    {
        $model = parent::toModel();
        if (isset($this->_parameters)) {
            $model['parameters'] = $this->_parameters->toModel();
        }
        return $model;
    }
}