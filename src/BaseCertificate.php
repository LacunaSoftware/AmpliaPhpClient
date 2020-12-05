<?php


namespace Lacuna\Amplia;


class BaseCertificate
{
    public $id;
    public $caId;
    public $subjectName;
    public $alias;
    public $emailAddress;
    public $issuerName;
    public $serialNumber;
    public $validityStart;
    public $validityEnd;
    public $crlDistributionPoints;
    public $ocspUris;
    public $contentBase64;
    public $kind;
    public $format;

    public function __construct($model)
    {
        $this->id = $model['id'];
        $this->caId = $model['caId'];
        $this->alias = $model['alias'];
        $this->serialNumber = $model['serialNumber'];
        $this->contentBase64 = $model['content'];
        $this->kind = $model['kind'];
        $this->format = $model['format'];

        if (isset($model['info'])) {
            $this->emailAddress = $model['info']['emailAddress'];
            $this->validityStart = $model['info']['validityStart'];
            $this->validityEnd = $model['info']['validityEnd'];
            $this->crlDistributionPoints = $model['info']['crlDistributionPoints'];
            $this->ocspUris = $model['info']['ocspUris'];

            if (isset($model['info']['subjectName'])) {
                $this->subjectName = new Name($model['info']['subjectName']);
            }

            if (isset($model['info']['issuerName'])) {
                $this->issuerName = new Name($model['info']['issuerName']);
            }
        }
    }

    public function toModel()
    {
        if (isset($this->subjectName) && !($this->subjectName instanceof Name)) {
            throw new \RuntimeException("Unsupported type for \"subjectName\" field on model for BaseCertificate: " . gettype($this->subjectName));
        }

        if (isset($this->issuerName) && !($this->issuerName instanceof Name)) {
            throw new \RuntimeException("Unsupported type for \"issuerName\" field on model for BaseCertificate: " . gettype($this->issuerName));
        }

        if (isset($this->kind)) {
            if ($this->kind != CertificateKinds::PUBLIC_KEY && $this->kind != CertificateKinds::ATTRIBUTE) {
                throw new \RuntimeException("Unsupported \"kind\" field on model for BaseCertificate: {$this->kind}");
            }
        }

        if (isset($this->format)) {
            if ($this->format != CertificateFormats::PKI_BRAZIL
                && $this->format != CertificateFormats::SSL
                && $this->format != CertificateFormats::CNB
                && $this->format != CertificateFormats::CIE
                && $this->format != CertificateFormats::ARISP
            ) {
                throw new \RuntimeException("Unsupported \"format\" field on model for BaseCertificate: {$this->format}");
            }
        }

        return [
            "id" => $this->id,
            "caId" => $this->caId,
            "alias" => $this->alias,
            "subjectName" => isset($this->subjectName) ? $this->subjectName->toModel() : null,
            "emailAddress" => $this->emailAddress,
            "issuerName" => isset($this->issuerName) ? $this->issuerName->toModel() : null,
            "serialNumber" => $this->serialNumber,
            "validityStart" => $this->validityStart,
            "validityEnd" => $this->validityEnd,
            "crlDistributionPoints" => $this->crlDistributionPoints,
            "ocspUris" => $this->ocspUris,
            "content" => $this->contentBase64,
            "kind" => $this->kind,
            "format" => $this->format,
        ];
    }
}