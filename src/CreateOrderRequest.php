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
    public function getCaId()
    {
        return $this->_caId;
    }

    /**
     * @param string $caId
     */
    public function setCaId($caId)
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