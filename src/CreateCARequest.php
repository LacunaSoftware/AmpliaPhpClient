<?php

namespace Lacuna\Amplia;

/**
 * Class CreateCARequest
 * @package Lacuna\Amplia
 *
 * @property $keyId string
 * @property $name string
 * @property $certificateId string
 * @property $certificateContent string
 * @property $kind CertificateKinds
 */
class CreateCARequest
{
    /**
     * @private
     * @var string
     */
    private $_keyId;

    /**
     * @private
     * @var string
     */
    private $_name;

    /**
     * @private
     * @var string
     */
    private $_certificateId;

    /**
     * @private
     * @var string
     */
    private $_certificateContent;

    /**
     * @private
     * @var CertificateKinds
     */
    private $_kind;

    /**
     * CreateCARequest constructor.
     * @param mixed $model
     */
    public function __construct($model = null)
    {
        if (isset($model)) {
            if (isset($model->keyId)) {
                $this->_keyId = $model->keyId;
            }
            if (isset($model->name)) {
                $this->_name = $model->name;
            }
            if (isset($model->certificateId)) {
                $this->_certificateId = $model->certificateId;
            }
            if (isset($model->certificateContent)) {
                $this->_certificateContent = $model->certificateContent;
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
     * @return string
     */
    public function getCertificateId()
    {
        return $this->_certificateId;
    }

    /**
     * @param string $id
     */
    public function setCertificateId($id)
    {
        $this->_certificateId = $id;
    }

    /**
     * @return string
     */
    public function getCertificateContent()
    {
        return $this->_certificateContent;
    }

    /**
     * @param string $cert
     */
    public function setCertificateContente($cert)
    {
        $this->_certificateContent = $cert;
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
            case 'certificateId':
                return $this->getCertificateId();
            case 'certificateContent':
                return $this->getCertificateContent();
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
            case 'certificateId':
                return isset($this->_certificateId);
            case 'certificateContent':
                return isset($this->_certificateContent);
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
            case 'certificateId':
                $this->setCertificateId($value);
                break;
            case 'certificateContent':
                $this->setCertificateContent($value);
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
        $model['keyId'] = $this->_keyId;
        $model['certificateId'] = $this->_certificateId;
        $model['certificateContent'] = $this->_certificateContent;
        $model['name'] = $this->_name;
        $model['kind'] = $this->_kind;
        return $model;
    }
}