<?php

namespace Lacuna\Amplia;

/**
 * Class CieCertificateParameters
 * @package Lacuna\Amplia
 *
 * @property $name string
 * @property $eea string
 * @property $birthDate string
 * @property $cpf string
 * @property $registrationNumber string
 * @property $idNumber string
 * @property $idIssuer string
 * @property $idIssuerState string
 * @property $institution CieInstitution
 * @property $degree string
 * @property $course string
 */
class CieCertificateParameters extends CertificateParameters
{
    /**
     * @private
     * @var string
     */
    private $_name;

    /**
     * @private
     * @var string
     */
    private $_eea;

    /**
     * @private
     * @var string
     */
    private $_birthDate;

    /**
     * @private
     * @var string
     */
    private $_cpf;

    /**
     * @private
     * @var string
     */
    private $_registrationNumber;

    /**
     * @private
     * @var string
     */
    private $_idNumber;

    /**
     * @private
     * @var string
     */
    private $_idIssuer;

    /**
     * @private
     * @var string
     */
    private $_idIssuerState;

    /**
     * @private
     * @var CieInstitution
     */
    private $_institution;

    /**
     * @private
     * @var string
     */
    private $_degree;

    /**
     * @private
     * @var string
     */
    private $_course;

    /**
     * CieCertificateParameters constructor.
     * @param mixed $model
     */
    public function __construct($model = null)
    {
        parent::__construct($model);
        $this->_format = CertificateFormats::CIE;
        if (isset($model)) {
            if (isset($model->name)) {
                $this->_name = $model->name;
            }
            if (isset($model->eea)) {
                $this->_eea = $model->eea;
            }
            if (isset($model->birthDate)) {
                $this->_birthDate = $model->birthDate;
            }
            if (isset($model->cpf)) {
                $this->_cpf = $model->cpf;
            }
            if (isset($model->registrationNumber)) {
                $this->_registrationNumber = $model->registrationNumber;
            }
            if (isset($model->idNumber)) {
                $this->_idNumber = $model->idNumber;
            }
            if (isset($model->idIssuer)) {
                $this->_idIssuer = $model->idIssuer;
            }
            if (isset($model->idIssuerState)) {
                $this->_idIssuerState = $model->idIssuerState;
            }
            if (isset($model->degree)) {
                $this->_degree = $model->degree;
            }
            if (isset($model->course)) {
                $this->_course = $model->course;
            }
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