<?php

namespace Lacuna\Amplia;

/**
 * Class KeyParametersModel
 * @package Lacuna\Amplia
 *
 * @property $keyStore string
 * @property $keyStoreParameters Object
 */
class KeyParametersModel
{
    /**
     * @private
     * @var string
     */
    private $_keyStore;

    /**
     * @private
     * @var Object
     */
    private $_keyStoreParameters;

    /**
     * KeyParametersModel constructor.
     * @param mixed $model
     */
    public function __construct($model = null)
    {
        if (isset($model)) {
            if (isset($model->keyStore)) {
                $this->_keyStore = $model->keyStore;
            }
            if (isset($model->keyStoreParameters)) {
                $this->_keyStoreParameters = $model->keyStoreParameters;
            }
        }
    }

    /**
     * @return string
     */
    public function getKeyStore()
    {
        return $this->_keyStore;
    }

    /**
     * @param string $keyStore
     */
    public function setKeyStore($keyStore)
    {
        $this->_keyStore = $keyStore;
    }

    /**
     * @return Object
     */
    public function getKeyStoreParameters()
    {
        return $this->_keyStoreParameters;
    }

    /**
     * @param Object $keyStoreParameters
     */
    public function setKeyStoreParameters($keyStoreParameters)
    {
        $this->_keyStoreParameters = $keyStoreParameters;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'keyStore':
                return $this->getKeyStore();
            case 'keyStoreParameters':
                return $this->getKeyStoreParameters();
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return null;
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'keyStore':
                return isset($this->_keyStore);
            case 'keyStoreParameters':
                return isset($this->_keyStoreParameters);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return false;
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'keyStore':
                $this->setKeyStore($value);
                break;
            case 'keyStoreParameters':
                $this->setKeyStoreParameters($value);
                break;
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
        }
    }

    public function toModel()
    {
        if (!isset($this->_keyStore)) {
            throw new \UnexpectedValueException('The "keyStore" was not set.');
        }
        $model['keyStore'] = $this->_keyStore;
        $model['keyStoreParameters'] = $this->_keyStoreParameters;
        return $model;
    }
}