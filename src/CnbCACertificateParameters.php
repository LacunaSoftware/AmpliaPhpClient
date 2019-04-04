<?php

namespace Lacuna\Amplia;

/**
 * Class CnbCACertificateParameters
 * @package Lacuna\Amplia
 *
 * @property $name string
 * @property $cns string
 * @property $streetAddress string
 * @property $locality string
 * @property $stateName string
 * @property $postalCode string
 */
class CnbCACertificateParameters extends CertificateParameters
{
    /**
     * @private
     * @var string
     */
    private $_name;

    /**
     * @private
     * @var string
     */
    private $_cns;

    /**
     * @private
     * @var string
     */
    private $_streetAddress;

    /**
     * @private
     * @var string
     */
    private $_locality;

    /**
     * @private
     * @var string
     */
    private $_stateName;

    /**
     * @private
     * @var string
     */
    private $_postalCode;

    /**
     * CnbCACertificateParameters constructor.
     * @param mixed $model
     */
    public function __construct($model = null)
    {
        parent::__construct($model);
        $this->_format = CertificateFormats::CNB_CA;
        if (isset($model)) {
            if (isset($model->name)) {
                $this->_name = $model->name;
            }
            if (isset($model->cns)) {
                $this->_cns = $model->cns;
            }
            if (isset($model->streetAddress)) {
                $this->_streetAddress = $model->streetAddress;
            }
            if (isset($model->locality)) {
                $this->_locality = $model->locality;
            }
            if (isset($model->stateName)) {
                $this->_stateName = $model->stateName;
            }
            if (isset($model->postalCode)) {
                $this->_postalCode = $model->postalCode;
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
    public function getCns()
    {
        return $this->_cns;
    }

    /**
     * @param string $cns
     */
    public function setCns($cns)
    {
        $this->_cns = $cns;
    }

    /**
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->_streetAddress;
    }

    /**
     * @param string $streetAddress
     */
    public function setStreetAddress($streetAddress)
    {
        $this->_streetAddress = $streetAddress;
    }

    /**
     * @return string
     */
    public function getLocality()
    {
        return $this->_locality;
    }

    /**
     * @param string $locality
     */
    public function setLocality($locality)
    {
        $this->_locality = $locality;
    }

    /**
     * @return string
     */
    public function getStateName()
    {
        return $this->_stateName;
    }

    /**
     * @param string $stateName
     */
    public function setStateName($stateName)
    {
        $this->_stateName = $stateName;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->_postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->_postalCode = $postalCode;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'name':
                return $this->getName();
            case 'cns':
                return $this->getCns();
            case 'streetAddress':
                return $this->getStreetAddress();
            case 'locality':
                return $this->getLocality();
            case 'stateName':
                return $this->getStateName();
            case 'postalCode':
                return $this->getPostalCode();
            default:
                return parent::__get($prop);
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'name':
                return isset($this->_name);
            case 'cns':
                return isset($this->_cns);
            case 'streetAddress':
                return isset($this->_streetAddress);
            case 'locality':
                return isset($this->_locality);
            case 'stateName':
                return isset($this->_stateName);
            case 'postalCode':
                return isset($this->_postalCode);
            default:
                return parent::__isset($prop);
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'name':
                $this->setName($value);
                break;
            case 'cns':
                $this->setCns($value);
                break;
            case 'streetAddress':
                $this->setStreetAddress($value);
                break;
            case 'locality':
                $this->setLocality($value);
                break;
            case 'stateName':
                $this->setStateName($value);
                break;
            case 'postalCode':
                $this->setPostalCode($value);
                break;
            default:
                parent::__set($prop, $value);
        }
    }

    public function toModel()
    {
        if (!isset($this->_name)) {
            throw new \UnexpectedValueException('The "name" field was not set.');
        }
        if (!isset($this->_cns)) {
            throw new \UnexpectedValueException('The "cns" field was not set.');
        }
        $model = parent::toModel();
        $model['name'] = $this->_name;
        $model['cns'] = $this->_cns;
        $model['streetAddress'] = $this->_streetAddress;
        $model['locality'] = $this->_locality;
        $model['stateName'] = $this->_stateName;
        $model['postalCode'] = $this->_postalCode;
        return $model;
    }
}