<?php

namespace Lacuna\Amplia;


/**
 * Class CertificateParameters
 * @package Lacuna\Amplia
 *
 * @property $format CertificateFormats
 */
class CertificateParameters
{
    /**
     * @private
     * @var string
     */
    protected $_format;

    /**
     * CertificateParameters constructor.
     * @param mixed $model
     */
    public function __construct($model = null)
    {
        if (isset($model)) {
            if (isset($model->format)) {
                $this->_format = $model->format;
            }
        }
    }

    /**
     * @param $parameters
     * @return string
     */
    static function encode($parameters)
    {
        return Util::encodeJson($parameters);
    }

    /**
     * @param $json
     */
    static function decodeJson($json)
    {
        $model = Util::decodeJson($json);
        if (!isset($model)) {
            throw new \InvalidArgumentException('Invalid template parameters JSON.');
        }
        CertificateParameters::decode($model);
    }

    static function decode($model)
    {
        $format = $model->format;
        if (!isset($format)) {
            throw new \InvalidArgumentException('The provided model doesn\'t have a "format" field.');
        }

        switch ($format) {
            case CertificateFormats::PKI_BRAZIL:
                return new PkiBrazilCertificateParameters($model);
            case CertificateFormats::SSL:
                return new SslCertificateParameters($model);
            case CertificateFormats::CNB:
                return new CnbCertificateParameters($model);
            case CertificateFormats::CNB_CA:
                return new CnbCACertificateParameters($model);
            case CertificateFormats::CIE:
                return new CieCertificateParameters($model);
            case CertificateFormats::ARISP:
                return new ArispCertificateParameters($model);
            default:
                throw new \InvalidArgumentException("The certificate \"format\" field not supported on model for CertificateParameters: {$format}");
        }
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->_format;
    }

    /**
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->_format = $format;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'format':
                return $this->getFormat();
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return null;
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'format':
                return isset($this->_format);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return false;
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'parameters':
                $this->setFormat($value);
                break;
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
        }
    }

    public function toModel()
    {
        if (!isset($this->_format)) {
            throw new \UnexpectedValueException('The "format" field was not set.');
        }

        return [
            'format' => $this->_format
        ];
    }
}