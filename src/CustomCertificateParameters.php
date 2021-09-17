<?php

namespace Lacuna\Amplia;

/**
 * Class CustomCertificateParameters
 * @package Lacuna\Amplia
 *
 * @property $subjectName Name
 * @property $keyUsages array
 * @property $extendedKeyUsages array
 */
class CustomCertificateParameters extends CertificateParameters
{
    /**
     * @private
     * @var Name
     */
    private $_subjectName;

    /**
     * @private
     * @var array
     */
    private $_keyUsages;

    /**
     * @private
     * @var array
     */
    private $_extendedKeyUsages;

    public function __construct($model = null)
    {
        parent::__construct($model);
        $this->_format = CertificateFormats::CUSTOM;
        if (isset($model)) {
            if (isset($model->subjectName)) {
                $this->_subjectName = $model->subjectName;
            }
            if (isset($model->keyUsages)) {
                $this->_keyUsages = [];
                foreach ($model->keyUsages as $keyUsage) {
                    array_push($this->_keyUsages, $keyUsage);
                }
            }
            if (isset($model->extendedKeyUsages)) {
                $this->_extendedKeyUsages = [];
                foreach ($model->extendedKeyUsages as $extendedKeyUsages) {
                    array_push($this->_extendedKeyUsages, $extendedKeyUsages);
                }
            }
        }
    }

    /**
     * @return Name
     */
    public function getSubjectName()
    {
        return $this->_subjectName;
    }

    /**
     * @param Name $subjectName
     */
    public function setSubjectName($subjectName)
    {
        $this->_subjectName = $subjectName;
    }

    /**
     * @return array
     */
    public function getExtendedKeyUsages()
    {
        return $this->_extendedKeyUsages;
    }

    /**
     * @param array $extendedKeyUsages
     */
    public function setExtendedKeyUsages($extendedKeyUsages)
    {
        $this->_extendedKeyUsages = $extendedKeyUsages;
    }

    /**
     * @return array
     */
    public function getKeyUsages()
    {
        return $this->_keyUsages;
    }

    /**
     * @param array $keyUsages
     */
    public function setKeyUsages($keyUsages)
    {
        $this->_keyUsages = $keyUsages;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'subjectName':
                return $this->getSubjectName();
            case 'extendedKeyUsages':
                return $this->getExtendedKeyUsages();
            case 'keyUsages':
                return $this->getKeyUsages();
            default:
                return parent::__get($prop);
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'subjectName':
                return isset($this->_subjectName);
            case 'extendedKeyUsages':
                return isset($this->_extendedKeyUsages);
            case 'keyUsages':
                return isset($this->_keyUsages);
            default:
                return parent::__isset($prop);
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'subjectName':
                $this->setSubjectName($value);
                break;
            case 'extendedKeyUsages':
                $this->setExtendedKeyUsages($value);
                break;
            case 'keyUsages':
                $this->setKeyUsages($value);
                break;
            default:
                parent::__set($prop, $value);
        }
    }

    public function toModel()
    {
        $model = parent::toModel();
        $model['subjectName'] = $this->_subjectName;
        $model['keyUsages'] = $this->_keyUsages;
        $model['extendedKeyUsages'] = $this->_extendedKeyUsages;
        return $model;
    }
}