<?php

namespace Lacuna\Amplia;


class CieCertificateParameters extends CertificateParameters
{
    private $_name;
    private $_eea;
    private $_birthDate;
    private $_cpf;
    private $_registrationNumber;
    private $_idNumber;
    private $_idIssuer;
    private $_idIssuerState;
    private $_institution;
    private $_degree;
    private $_course;

    public function __construct($model = null)
    {
        parent::__construct($model);
        $this->_format = CertificateFormats::CIE;
        if (isset($model)) {
            $this->_name = $model->name ?: null;
            $this->_eea = $model->eea ?: null;
            $this->_birthDate = $model->birthDate ?: null;
            $this->_cpf = $model->cpf ?: null;
            $this->_registrationNumber = $model->registrationNumber ?: null;
            $this->_idNumber = $model->idNumber ?: null;
            $this->_idIssuer = $model->idIssuer ?: null;
            $this->_idIssuerState = $model->idIssuerState ?: null;
            $this->_degree = $model->degree ?: null;
            $this->_course = $model->course ?: null;

            if (isset($model->institution)) {
                $this->_institution = new CieInstitution($model->institution);
            }
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
    public function getEea()
    {
        return $this->_eea;
    }

    /**
     * @param string $eea
     */
    public function setEea($eea)
    {
        $this->_eea = $eea;
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
    public function getRegistrationNumber()
    {
        return $this->_registrationNumber;
    }

    /**
     * @param string $registrationNumber
     */
    public function setRegistrationNumber($registrationNumber)
    {
        $this->_registrationNumber = $registrationNumber;
    }

    /**
     * @return string
     */
    public function getIdNumber()
    {
        return $this->_idNumber;
    }

    /**
     * @param string $idNumber
     */
    public function setIdNumber($idNumber)
    {
        $this->_idNumber = $idNumber;
    }

    /**
     * @return string
     */
    public function getIdIssuer()
    {
        return $this->_idIssuer;
    }

    /**
     * @param string $idIssuer
     */
    public function setIdIssuer($idIssuer)
    {
        $this->_idIssuer = $idIssuer;
    }

    /**
     * @return string
     */
    public function getIdIssuerState()
    {
        return $this->_idIssuerState;
    }

    /**
     * @param string $idIssuerState
     */
    public function setIdIssuerState($idIssuerState)
    {
        $this->_idIssuerState = $idIssuerState;
    }

    /**
     * @return CieInstitution
     */
    public function getInstitution()
    {
        return $this->_institution;
    }

    /**
     * @param CieInstitution $institution
     */
    public function setInstitution($institution)
    {
        $this->_institution = $institution;
    }

    /**
     * @return string
     */
    public function getDegree()
    {
        return $this->_degree;
    }

    /**
     * @param string $degree
     */
    public function setDegree($degree)
    {
        $this->_degree = $degree;
    }

    /**
     * @return string
     */
    public function getCourse()
    {
        return $this->_course;
    }

    /**
     * @param string $course
     */
    public function setCourse($course)
    {
        $this->_course = $course;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'name':
                return $this->getName();
            case 'eea':
                return $this->getEea();
            case 'birthDate':
                return $this->getBirthDate();
            case 'cpf':
                return $this->getCpf();
            case 'registrationNumber':
                return $this->getRegistrationNumber();
            case 'idNumber':
                return $this->getIdNumber();
            case 'idIssuer':
                return $this->getIdIssuer();
            case 'idIssuerState':
                return $this->getIdIssuerState();
            case 'institution':
                return $this->getInstitution();
            case 'degree':
                return $this->getDegree();
            case 'course':
                return $this->getCourse();
            default:
                return parent::__get($prop);
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'name':
                return isset($this->_name);
            case 'eea':
                return isset($this->_eea);
            case 'birthDate':
                return isset($this->_birthDate);
            case 'cpf':
                return isset($this->_cpf);
            case 'registrationNumber':
                return isset($this->_registrationNumber);
            case 'idNumber':
                return isset($this->_idNumber);
            case 'idIssuer':
                return isset($this->_idIssuer);
            case 'idIssuerState':
                return isset($this->_idIssuerState);
            case 'institution':
                return isset($this->_institution);
            case 'degree':
                return isset($this->_degree);
            case 'course':
                return isset($this->_course);
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
            case 'eea':
                $this->setEea($value);
                break;
            case 'birthDate':
                $this->setBirthDate($value);
                break;
            case 'cpf':
                $this->setCpf($value);
                break;
            case 'registrationNumber':
                $this->setRegistrationNumber($value);
                break;
            case 'idNumber':
                $this->setIdNumber($value);
                break;
            case 'idIssuer':
                $this->setIdIssuer($value);
                break;
            case 'idIssuerState':
                $this->setIdIssuerState($value);
                break;
            case 'institution':
                $this->setInstitution($value);
                break;
            case 'degree':
                $this->setDegree($value);
                break;
            case 'course':
                $this->setCourse($value);
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
        if (!isset($this->_registrationNumber)) {
            throw new \UnexpectedValueException('The "registrationName" field was not set.');
        }
        if (!isset($this->_degree)) {
            throw new \UnexpectedValueException('The "degree" field was not set.');
        }
        if (!isset($this->_course)) {
            throw new \UnexpectedValueException('The "course" field was not set.');
        }
        $model = parent::toModel();
        $model['name'] = $this->_name;
        $model['eea'] = $this->_eea;
        $model['birthDate'] = $this->_birthDate;
        $model['cpf'] = $this->_cpf;
        $model['registrationNumber'] = $this->_registrationNumber;
        $model['idNumber'] = $this->_idNumber;
        $model['idIssuer'] = $this->_idIssuer;
        $model['idIssuerState'] = $this->_idIssuerState;
        $model['degree'] = $this->_degree;
        $model['course'] = $this->_course;

        if (isset($this->_institution)) {
            $model['institution'] = $this->_institution->toModel();
        }
        return $model;
    }
}