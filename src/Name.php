<?php


namespace Lacuna\Amplia;


class Name
{
    public $country;
    public $organization;
    public $organizationUnit;
    public $dnQualifier;
    public $stateName;
    public $commonName;
    public $serialNumber;
    public $locality;
    public $title;
    public $surname;
    public $givenName;
    public $initials;
    public $pseudonym;
    public $generationQualifier;
    public $emailAddress;

    public function __construct($model)
    {
        $this->country = $model['country'];
        $this->organization = $model['organization'];
        $this->organizationUnit = $model['organizationUnit'];
        $this->dnQualifier = $model['dnQualifier'];
        $this->stateName = $model['stateName'];
        $this->commonName = $model['commonName'];
        $this->serialNumber = $model['serialNumber'];
        $this->locality = $model['locality'];
        $this->title = $model['title'];
        $this->surname = $model['surname'];
        $this->givenName = $model['givenName'];
        $this->initials = $model['initials'];
        $this->pseudonym = $model['pseudonym'];
        $this->generationQualifier = $model['generationQualifier'];
        $this->emailAddress = $model['emailAddress'];
    }

    public function toModel()
    {
        return [
            "country" => $this->country,
            "organization" => $this->organization,
            "organizationUnit" => $this->organizationUnit,
            "dnQualifier" => $this->dnQualifier,
            "stateName" => $this->stateName,
            "commonName" => $this->commonName,
            "serialNumber" => $this->serialNumber,
            "locality" => $this->locality,
            "title" => $this->title,
            "surname" => $this->surname,
            "givenName" => $this->givenName,
            "initials" => $this->initials,
            "pseudonym" => $this->pseudonym,
            "generationQualifier" => $this->generationQualifier,
            "emailAddress" => $this->emailAddress,
        ];
    }
}