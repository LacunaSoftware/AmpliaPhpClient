<?php

namespace Lacuna\Amplia;

/**
 * Class RSAPublicParametersModel
 * @package Lacuna\Amplia
 *
 * @property $modulus string
 * @property $exponent string
 */
class RSAPublicParametersModel
{
    /**
     * @private
     * @var string
     */
    private $_modulus;

    /**
     * @private
     * @var string
     */
    private $_exponent;

    /**
     * RSAPublicParametersModel constructor.
     * @param mixed $model
     */
    public function __construct($model = null)
    {
        if (isset($model)) {
            if (isset($model->modulus)) {
                $this->_modulus = $model->modulus;
            }
            if (isset($model->exponent)) {
                $this->_exponent = $model->exponent;
            }
        }
    }

    /**
     * @return string
     */
    public function getModulus()
    {
        return $this->_modulus;
    }

    /**
     * @param string $modulus
     */
    public function setModulus($modulus)
    {
        $this->_modulus = $modulus;
    }

    /**
     * @return string
     */
    public function getExponent()
    {
        return $this->_exponent;
    }

    /**
     * @param string $exponent
     */
    public function setExponent($exponent)
    {
        $this->_exponent = $exponent;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'modulus':
                return $this->getModulus();
            case 'exponent':
                return $this->getExponent();
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return null;
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'modulus':
                return isset($this->_modulus);
            case 'exponent':
                return isset($this->_exponent);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return false;
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'modulus':
                $this->setModulus($value);
                break;
            case 'exponent':
                $this->setExponent($value);
                break;
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
        }
    }

    public function toModel()
    {
        $model['modulus'] = $this->_modulus;
        $model['exponent'] = $this->_exponent;
        return $model;
    }
}