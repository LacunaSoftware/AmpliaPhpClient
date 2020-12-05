<?php


namespace Lacuna\Amplia;


class CertificateSummary
{
    public $id;
    public $subscriptionId;
    public $caId;
    public $keyId;
    public $dateIssued;
    public $dateExpires;
    public $dateRevoked;
    public $alias;
    public $subjectDisplayName;
    public $serialNumber;
    public $isCA;
    public $kind;
    public $format;

    public function __construct($model)
    {
        $this->id = $model['id'];
        $this->subscriptionId = $model['subscriptionId'];
        $this->caId = $model['caId'];
        $this->keyId = $model['keyId'];
        $this->dateIssued = $model['dateIssued'];
        $this->dateExpires = $model['dateExpires'];
        $this->dateRevoked = $model['dateRevoked'];
        $this->alias = $model['alias'];
        $this->subjectDisplayName = $model['subjectDisplayName'];
        $this->serialNumber = $model['serialNumber'];
        $this->isCA = $model['isCA'];
        $this->kind = $model['kind'];
        $this->format = $model['format'];
    }
}