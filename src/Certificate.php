<?php


namespace Lacuna\Amplia;


class Certificate extends BaseCertificate
{
    public $parameters;

    public function __construct($model)
    {
        parent::__construct($model);

        if (isset($model['parameters'])) {
            $this->parameters = CertificateParameters::decode($model['parameters']);
        }
    }

    public function toModel()
    {
        if (isset($this->parameters) && !($this->parameters instanceof CertificateParameters)) {
            throw new \RuntimeException("Unsupported type for \"parameters\" on model for Certificate: " . gettype($this->parameters));
        }

        $model = parent::toModel();
        $model['parameters'] = isset($this->parameters) ? $this->parameters->toModel() : null;
        return $model;
    }
}