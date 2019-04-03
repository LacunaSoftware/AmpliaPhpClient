<?php

namespace Lacuna\Amplia;

/**
 * Class CnbCertificateParameters
 * @package Lacuna\Amplia
 *
 * @property $certificateType CnbCertificateTypes
 */
class CnbCertificateParameters extends PkiBrazilCertificateParameters
{
    private $_certificateType;

    public function __construct($model = null)
    {
        parent::__construct($model);
        $this->_format = CertificateFormats::CNB;

        if (isset($model)) {
            if (isset($model->certificateType)) {
                $this->_certificateType = $model->certificateType;
            }
        }
    }

    /**
     * @return CnbCertificateTypes
     */
    public function getCertificateType()
    {
        return $this->_certificateType;
    }

    /**
     * @param CnbCertificateTypes $certificateType
     */
    public function setCertificateType($certificateType)
    {
        $this->_certificateType = $certificateType;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'certificateType':
                return $this->getCertificateType();
            default:
                return parent::__get($prop);
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'certificateType':
                return isset($this->_certificateType);
            default:
                return parent::__isset($prop);
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'certificateType':
                $this->setCertificateType($value);
                break;
            default:
                parent::__set($prop, $value);
        }
    }

    public function toModel()
    {
        $model = parent::toModel();
        $model['certificateType'] = $this->_certificateType;
        return $model;
    }
}