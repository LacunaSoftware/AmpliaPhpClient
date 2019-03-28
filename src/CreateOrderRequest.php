<?php

namespace Lacuna\Amplia;


class CreateOrderRequest
{
    private $_caId;
    private $_templateId;
    private $_kind;
    private $_copyToCertificate;
    private $_parameters;
    private $_validityEnd;

    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getCAId()
    {
        return $this->_caId;
    }

    /**
     * @param string $caId
     */
    public function setCAId($caId)
    {
        $this->_caId = $caId;
    }

    /**
     * @return string
     */
    public function getTemplateId()
    {
        return $this->_templateId;
    }

    /**
     * @param string $templateId
     */
    public function setTemplateId($templateId)
    {
        $this->_templateId = $templateId;
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

    /**
     * @return string
     */
    public function getCopyToCertificate()
    {
        return $this->_copyToCertificate;
    }

    /**
     * @param string $copyToCertificate
     */
    public function setCopyToCertificate($copyToCertificate)
    {
        $this->_copyToCertificate = $copyToCertificate;
    }

    /**
     * @return CertificateParameters
     */
    public function getParameters()
    {
        return $this->_parameters;
    }

    /**
     * @param CertificateParameters $parameters
     */
    public function setParameters($parameters)
    {
        $this->_parameters = $parameters;
    }

    /**
     * @return string
     */
    public function getValidityEnd()
    {
        return $this->_validityEnd;
    }

    /**
     * @param string $validityEnd
     */
    public function setValidityEnd($validityEnd)
    {
        $this->_validityEnd = $validityEnd;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'caId':
                return $this->getCAId();
            case 'templateId':
                return $this->getTemplateId();
            case 'kind':
                return $this->getKind();
            case 'copyToCertificate':
                return $this->getCopyToCertificate();
            case 'parameters':
                return $this->getParameters();
            case 'validityEnd':
                return $this->getValidityEnd();
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return null;
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'caId':
                return isset($this->_caId);
            case 'templateId':
                return isset($this->_templateId);
            case 'kind':
                return isset($this->_kind);
            case 'copyToCertificate':
                return isset($this->_copyToCertificate);
            case 'parameters':
                return isset($this->_parameters);
            case 'validityEnd':
                return isset($this->_validityEnd);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return false;
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'caId':
                $this->setCAId($value);
                break;
            case 'templateId':
                $this->setTemplateId($value);
                break;
            case 'kind':
                $this->setKind($value);
                break;
            case 'copyToCertificate':
                $this->setCopyToCertificate($value);
                break;
            case 'parameters':
                $this->setParameters($value);
                break;
            case 'validityEnd':
                $this->setValidityEnd($value);
                break;
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
        }
    }

    public function toModel()
    {
        $model = [
            'caId' => $this->_caId,
            'templateId' => $this->_templateId,
            'kind' => $this->_kind,
            'copyToCertificate' => $this->_copyToCertificate,
            'validityEnd' => $this->_validityEnd
        ];
        if (isset($this->_parameters)) {
            $model['parameters'] = $this->_parameters->toModel();
        }
        return $model;
    }
}