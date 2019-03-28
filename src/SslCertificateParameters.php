<?php

namespace Lacuna\Amplia;


class SslCertificateParameters extends CertificateParameters
{
    private $_dnsNames;

    public function __construct($model = null)
    {
        parent::__construct($model);
        $this->_format = CertificateFormats::SSL;

        if (isset($model)) {
            $this->_dnsNames = $model->dnsNames ?: null;
        }
    }

    /**
     * @return array
     */
    public function getDnsNames()
    {
        return $this->_dnsNames;
    }

    /**
     * @param array $dnsNames
     */
    public function setDnsNames($dnsNames)
    {
        $this->_dnsNames = $dnsNames;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'dnsNames':
                return $this->getDnsNames();
            default:
                return parent::__get($prop);
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'dnsNames':
                return isset($this->_dnsNames);
            default:
                return parent::__isset($prop);
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'dnsNames':
                $this->setDnsNames($value);
                break;
            default:
                parent::__set($prop, $value);
        }
    }

    public function toModel()
    {
        $model = parent::toModel();
        $model['dnsNames'] = $this->_dnsNames;
        return $model;
    }
}