<?php

namespace Lacuna\Amplia;

/**
 * Class CreateKeyRequest
 * @package Lacuna\Amplia
 * 
 * @property $name string
 * @property $size int
 * @property $keyStore string
 * @property $keyType KeyTypes
 * @property $curve string
 */
class CreateKeyRequest
{
    /**
     * @private
     * @var string
     */
    private $_name;

    /**
     * @private
     * @var int
     */
    private $_size;

    /**
     * @private
     * @var string
     */
    private $_keyStore;

    /**
     * @private
     * @var KeyTypes
     */
    private $_keyType;

    /**
     * @private
     * @var string
     */
    private $_curve;

    /**
     * CreateKeyRequest constructor.
     * @param mixed $model
     */
    public function __construct($model = null)
    {
        if (isset($model)) {
            if (isset($model->name)) {
                $this->_name = $model->name;
            }
            if (isset($model->size)) {
                $this->_size = $model->size;
            }
            if (isset($model->keyStore)) {
                $this->_keyStore = $model->keyStore;
            }
            if (isset($model->keyType)) {
                $this->_keyType = $model->keyType;
            }
            if (isset($model->curve)) {
                $this->_curve = $model->curve;
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
     * @return int
     */
    public function getSize()
    {
        return $this->_size;
    }

    /**
     * @param int $size
     */
    public function setSize($size)
    {
        $this->_size = $size;
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
     * @return KeyTypes
     */
    public function getKeyType()
    {
        return $this->_keyType;
    }

    /**
     * @param KeyTypes $keyType
     */
    public function setKeyType($keyType)
    {
        $this->_keyType = $keyType;
    }

    /**
     * @return string
     */
    public function getCurve()
    {
        return $this->_curve;
    }

    /**
     * @param string $curve
     */
    public function setCurve($curve)
    {
        $this->_curve = $curve;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'name':
                return $this->getName();
            case 'size':
                return $this->getSize();
            case 'keyStore':
                return $this->getKeyStore();
            case 'keyType':
                return $this->getKeyType();
                return $this->getKeyStore();
            case 'curve':
                return $this->getCurve();
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
            case 'size':
                return isset($this->_size);
            case 'keyStore':
                return isset($this->_keyStore);
            case 'keyType':
                return isset($this->_keyType);
            case 'curve':
                return isset($this->_curve);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return false;
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'name':
                $this->setname($value);
                break;
            case 'size':
                $this->setSize($value);
                break;
            case 'keyStore':
                $this->setKeyStore($value);
                break;
            case 'keyType':
                $this->setKeyType($value);
                break;
            case 'curve':
                $this->setCurve($value);
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
        $model['name'] = $this->_name;
        $model['size'] = $this->_size;
        $model['keyStore'] = $this->_keyStore;
        $model['keyType'] = $this->_keyType;
        $model['curve'] = $this->_curve;
        return $model;
    }
}