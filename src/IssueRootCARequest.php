<?php

namespace Lacuna\Amplia;

/**
 * Class IssueRootCARequest
 * @package Lacuna\Amplia
 *
 * @property $keyId string
 * @property $certificate CACertificate
 * @property $name string
 * @property $kind CertificateKinds
 */
class IssueRootCARequest
{
    /**
     * @private
     * @var string
     */
    private $_keyId;

    /**
     * @private
     * @var CACertificate
     */
    private $_certificate;

    /**
     * @private
     * @var string
     */
    private $_name;

    /**
     * @private
     * @var CertificateKinds
     */
    private $_kind;

    /**
     * IssueRootCARequest constructor.
     * @param mixed $model
     */
    public function __construct($model = null)
    {
        if (isset($model)) {
            if (isset($model->keyId)) {
                $this->_keyId = $model->keyId;
            }
            if (isset($model->certificate)) {
                $this->_certificate = $model->certificate;
            }
            if (isset($model->name)) {
                $this->_name = $model->name;
            }
            if (isset($model->kind)) {
                $this->_kind = $model->kind;
            }
        }
    }

    /**
     * @return string
     */
    public function getKeyId()
    {
        return $this->_keyId;
    }

    /**
     * @param string $keyId
     */
    public function setKeyId($keyId)
    {
        $this->_keyId = $keyId;
    }

    /**
     * @return CACertificate
     */
    public function getCertificate()
    {
        return $this->_certificate;
    }

    /**
     * @param CACertificate $cert
     */
    public function setCertificate($cert)
    {
        $this->_certificate = $cert;
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
     * @return CertificateKinds
     */
    public function getKind()
    {
        return $this->_kind;
    }

    /**
     * @param CertificateKinds $kind
     */
    public function setKind($kind)
    {
        $this->_kind = $kind;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'keyId':
                return $this->getKeyId();
            case 'certificate':
                return $this->getCertificate();
            case 'name':
                return $this->getName();
            case 'kind':
                return $this->getKind();
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return null;
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'keyId':
                return isset($this->_keyId);
            case 'certificate':
                return isset($this->_certificate);
            case 'name':
                return isset($this->_name);
            case 'kind':
                return isset($this->_kind);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return false;
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'keyId':
                $this->setKeyId($value);
                break;
            case 'certificate':
                $this->setCertificate($value);
                break;
            case 'name':
                $this->setName($value);
                break;
            case 'kind':
                $this->setKind($value);
                break;
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
        }
    }

    public function toModel()
    {
        if (!isset($this->_keyId)) {
            throw new \UnexpectedValueException('The "keyId" was not set.');
        }
        if (!isset($this->_name)) {
            throw new \UnexpectedValueException('The "name" was not set.');
        }
        if (!isset($this->_certificate)) {
            throw new \UnexpectedValueException('The "certificate" was not set.');
        }
        $model['keyId'] = $this->_keyId;
        if(isset($this->_certificate)){
            $model['certificate'] = $this->_certificate->toModel();
        }
        $model['name'] = $this->_name;
        $model['kind'] = $this->_kind;
        return $model;
    }
}