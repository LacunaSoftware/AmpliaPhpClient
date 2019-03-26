<?php

namespace Lacuna\Amplia;


class PkiBrazilCertificateParameters extends CertificateParameters
{
    private $_name;
    private $_emailAddress;
    private $_cnpj;
    private $_companyName;
    private $_cpf;
    private $_birthDate;
    private $_oabUF;
    private $_oabNumero;
    private $_rgEmissor;
    private $_rgEmissorUF;
    private $_rgNumero;
    private $_organizationUnits;
    private $_organization;
    private $_country;
    private $_phoneNumber;

    public function __construct($model = null)
    {
        parent::__construct($model);
        $this->_format = CertificateFormats::PKI_BRAZIL;
        if (isset($model)) {
            $this->_name = $model['name'] ?: null;
            $this->_emailAddress = $model['emailAddress'] ?: null;
            $this->_cnpj = $model['cnpj'] ?: null;
            $this->_companyName = $model['companyName'] ?: null;
            $this->_cpf = $model['cpf'] ?: null;
            $this->_birthDate = $model['birthDate'] ?: null;
            $this->_oabUF = $model['oabUF'] ?: null;
            $this->_oabNumero = $model['oabNumero'] ?: null;
            $this->_rgEmissor = $model['rgEmissor'] ?: null;
            $this->_rgEmissorUF = $model['rgEmissorUF'] ?: null;
            $this->_rgNumero = $model['rgNumero'] ?: null;
            $this->_organizationUnits = $model['organizationUnits'] ?: null;
            $this->_organization = $model['organization'] ?: null;
            $this->_country = $model['country'] ?: null;
            $this->_phoneNumber = $model['phoneNumber'] ?: null;
        }
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
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->_emailAddress;
    }

    /**
     * @param string $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->_emailAddress = $emailAddress;
    }

    /**
     * @return string
     */
    public function getCnpj()
    {
        return $this->_cnpj;
    }

    /**
     * @param string $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->_cnpj = $cnpj;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->_companyName;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->_companyName = $companyName;
    }

    /**
     * @return string
     */
    public function getCpf()
    {
        return $this->_cpf;
    }

    /**
     * @param string $cpf
     */
    public function setCpf($cpf)
    {
        $this->_cpf = $cpf;
    }

    /**
     * @return string
     */
    public function getBirthDate()
    {
        return $this->_birthDate;
    }

    /**
     * @param string $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->_birthDate = $birthDate;
    }

    /**
     * @return string
     */
    public function getOabUF()
    {
        return $this->_oabUF;
    }

    /**
     * @param string $oabUF
     */
    public function setOabUF($oabUF)
    {
        $this->_oabUF = $oabUF;
    }

    /**
     * @return string
     */
    public function getOabNumero()
    {
        return $this->_oabNumero;
    }

    /**
     * @param string $oabNumero
     */
    public function setOabNumero($oabNumero)
    {
        $this->_oabNumero = $oabNumero;
    }

    /**
     * @return string
     */
    public function getRGEmissor()
    {
        return $this->_rgEmissor;
    }

    /**
     * @param string $rgEmissor
     */
    public function setRGEmissor($rgEmissor)
    {
        $this->_rgEmissor = $rgEmissor;
    }

    /**
     * @return string
     */
    public function getRGEmissorUF()
    {
        return $this->_rgEmissorUF;
    }

    /**
     * @param string $rgEmissorUF
     */
    public function setRGEmissorUF($rgEmissorUF)
    {
        $this->_rgEmissorUF = $rgEmissorUF;
    }

    /**
     * @return string
     */
    public function getRGNumero()
    {
        return $this->_rgNumero;
    }

    /**
     * @param string $rgNumero
     */
    public function setRGNumero($rgNumero)
    {
        $this->_rgNumero = $rgNumero;
    }

    /**
     * @return array
     */
    public function getOrganizationUnits()
    {
        return $this->_organizationUnits;
    }

    /**
     * @param array $organizationUnits
     */
    public function setOrganizationUnits($organizationUnits)
    {
        $this->_organizationUnits = $organizationUnits;
    }

    /**
     * @return string
     */
    public function getOrganization()
    {
        return $this->_organization;
    }

    /**
     * @param string $organization
     */
    public function setOrganization($organization)
    {
        $this->_organization = $organization;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->_country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->_country = $country;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->_phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->_phoneNumber = $phoneNumber;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'name':
                return $this->getName();
            case 'emailAddress':
                return $this->getEmailAddress();
            case 'cnpj':
                return $this->getCnpj();
            case 'companyName':
                return $this->getCompanyName();
            case 'cpf':
                return $this->getCpf();
            case 'birthDate':
                return $this->getBirthDate();
            case 'oabUF':
                return $this->getOabUF();
            case 'oabNumero':
                return $this->getOabNumero();
            case 'rgEmissor':
                return $this->getRGEmissor();
            case 'rgEmissorUF':
                return $this->getRGEmissorUF();
            case 'rgNumero':
                return $this->getRGNumero();
            case 'organizationUnits':
                return $this->getOrganizationUnits();
            case 'organization':
                return $this->getOrganization();
            case 'country':
                return $this->getCountry();
            case 'phoneNumber':
                return $this->getPhoneNumber();
            default:
                return parent::__get($prop);
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'name':
                return isset($this->_name);
            case 'emailAddress':
                return isset($this->_emailAddress);
            case 'cnpj':
                return isset($this->_cnpj);
            case 'companyName':
                return isset($this->_companyName);
            case 'cpf':
                return isset($this->_cpf);
            case 'birthDate':
                return isset($this->_birthDate);
            case 'oabUF':
                return isset($this->_oabUF);
            case 'oabNumero':
                return isset($this->_oabNumero);
            case 'rgEmissor':
                return isset($this->_rgEmissor);
            case 'rgEmissorUF':
                return isset($this->_rgEmissorUF);
            case 'rgNumero':
                return isset($this->_rgNumero);
            case 'organizationUnits':
                return isset($this->_organizationUnits);
            case 'organization':
                return isset($this->_organization);
            case 'country':
                return isset($this->_country);
            case 'phoneNumber':
                return isset($this->_phoneNumber);
            default:
                return parent::__isset($prop);
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'name':
                $this->setName($value);
                break;
            case 'emailAddress':
                $this->setEmailAddress($value);
                break;
            case 'cnpj':
                $this->setCnpj($value);
                break;
            case 'companyName':
                $this->setCompanyName($value);
                break;
            case 'cpf':
                $this->setCpf($value);
                break;
            case 'birthDate':
                $this->setBirthDate($value);
                break;
            case 'oabUF':
                $this->setOabUF($value);
                break;
            case 'oabNumero':
                $this->setOabNumero($value);
                break;
            case 'rgEmissor':
                $this->setRGEmissor($value);
                break;
            case 'rgEmissorUF':
                $this->setRGEmissorUF($value);
                break;
            case 'rgNumero':
                $this->setRGNumero($value);
                break;
            case 'organizationUnits':
                $this->setOrganizationUnits($value);
                break;
            case 'organization':
                $this->setOrganization($value);
                break;
            case 'country':
                $this->setCountry($value);
                break;
            case 'phoneNumber':
                $this->setPhoneNumber($value);
                break;
            default:
                parent::__set($prop, $value);
        }
    }

    public function toModel()
    {
        if (!isset($this->_name)) {
            throw new \UnexpectedValueException('The "name" field was not set.');
        }
        if (!isset($this->_cpf)) {
            throw new \UnexpectedValueException('The "cpf" field was not set.');
        }

        $model = parent::toModel();
        $model['name'] = $this->_name;
        $model['emailAddress'] = $this->_emailAddress;
        $model['cnpj'] = $this->_cnpj;
        $model['companyName'] = $this->_companyName;
        $model['cpf'] = $this->_cpf;
        $model['birthDate'] = $this->_birthDate;
        $model['oabUF'] = $this->_oabUF;
        $model['oabNumero'] = $this->_oabNumero;
        $model['rgEmissor'] = $this->_rgEmissor;
        $model['rgEmissorUF'] = $this->_rgEmissorUF;
        $model['rgNumero'] = $this->_rgNumero;
        $model['organizationUnits'] = $this->_organizationUnits;
        $model['organization'] = $this->_organization;
        $model['country'] = $this->_country;
        $model['phoneNumber'] = $this->_phoneNumber;
        return $model;
    }
}