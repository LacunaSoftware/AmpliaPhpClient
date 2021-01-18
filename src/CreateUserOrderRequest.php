<?php

namespace Lacuna\Amplia;

/**
 * Class CreateUserOrderRequest
 * @package Lacuna\Amplia
 *
 * @property $subject string
 * @property $name string
 * @property $emailAddress string
 * @property $dateOfBirth string
 * @property $cpf string
 * @property $phoneNumber string
 * @property $caId string
 * @property $templateId string
 * @property $validityEnd string
 * @property $validity string
 */
class CreateUserOrderRequest
{
    /**
     * @private
     * @var string
     */
    private $_subject;

    /**
     * @private
     * @var string
     */
    private $_name;

    /**
     * @private
     * @var string
     */
    private $_emailAddress;

    /**
     * @private
     * @var string
     */
    private $_dateOfBirth;

    /**
     * @private
     * @var string
     */
    private $_cpf;

    /**
     * @private
     * @var string
     */
    private $_phoneNumber;

    /**
     * @private
     * @var string
     */
    private $_caId;

    /**
     * @private
     * @var string
     */
    private $_templateId;

    /**
     * @private
     * @var string
     */
    private $_validityEnd;

    /**
     * @private
     * @var string
     */
    private $_validity;

    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->_subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->_subject = $subject;
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
    public function getDateOfBirth()
    {
        return $this->_dateOfBirth;
    }

    /**
     * @param string $dateOfBirth
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->_dateOfBirth = $dateOfBirth;
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

    /**
     * @return string
     */
    public function getValidity()
    {
        return $this->_validity;
    }

    /**
     * @param string $validity
     */
    public function setValidity($validity)
    {
        $this->_validity = $validity;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'subject':
                return $this->getSubject();
            case 'name':
                return $this->getName();
            case 'emailAddress':
                return $this->getEmailAddress();
            case 'dateOfBirth':
                return $this->getDateOfBirth();
            case 'cpf':
                return $this->getCpf();
            case 'phoneNumber':
                return $this->getPhoneNumber();
            case 'caId':
                return $this->getCAId();
            case 'templateId':
                return $this->getTemplateId();
            case 'validityEnd':
                return $this->getValidityEnd();
            case 'validity':
                return $this->getValidity();
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return null;
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'subject':
                return isset($this->_subject);
            case 'name':
                return isset($this->_name);
            case 'emailAddress':
                return isset($this->_emailAddress);
            case 'dateOfBirth':
                return isset($this->_dateOfBirth);
            case 'cpf':
                return isset($this->_cpf);
            case 'phoneNumber':
                return isset($this->_phoneNumber);
            case 'caId':
                return isset($this->_caId);
            case 'templateId':
                return isset($this->_templateId);
            case 'validityEnd':
                return isset($this->_validityEnd);
            case 'validity':
                return isset($this->_validity);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return false;
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'subject':
                $this->setSubject($value);
                break;
            case 'name':
                $this->setName($value);
                break;
            case 'emailAddress':
                $this->setEmailAddress($value);
                break;
            case 'dateOfBirth':
                $this->setDateOfBirth($value);
                break;
            case 'cpf':
                $this->setCpf($value);
                break;
            case 'phoneNumber':
                $this->setPhoneNumber($value);
                break;
            case 'caId':
                $this->setCAId($value);
                break;
            case 'templateId':
                $this->setTemplateId($value);
                break;
            case 'validityEnd':
                $this->setValidityEnd($value);
                break;
            case 'validity':
                $this->setValidity($value);
                break;
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
        }
    }

    public function toModel()
    {
        $model = [
            'subject' => $this->_subject,
            'name' => $this->_name,
            'emailAddress' => $this->_emailAddress,
            'dateOfBirth' => $this->_dateOfBirth,
            'cpf' => $this->_cpf,
            'phoneNumber' => $this->_phoneNumber,
            'caId' => $this->_caId,
            'templateId' => $this->_templateId,
            'validityEnd' => $this->_validityEnd,
            'validity' => $this->_validity
        ];
        return $model;
    }
}