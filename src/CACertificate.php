<?php

namespace Lacuna\Amplia;

/**
 * Class CACertificate
 * @package Lacuna\Amplia
 * 
 * @property $subjectName Name
 * @property $final bool
 * @property $validityStart 
 * @property $validityEnd 
 * 
 */
class CACertificate
{
    /**
     * @private
     * @var Name
     */
    private $_subjectName;

    /**
     * @private
     * @var bool
     */
    private $_final;

    /**
     * @private
     * @var string
     */
    private $_validityEnd;

    /**
     * @private
     * @var ValidityStarts
     */
    private $_validityStart;

    /**
     * CACertificate constructor.
     * @param mixed $model
     */
    public function __construct($model = null)
    {
        if (isset($model)) {
            if (isset($model->subjectName)) {
                $this->_subjectName = new Name($model->subjectName);
            }
            if (isset($model->final)) {
                $this->_final = $model->final;
            }
            if (isset($model->validityStart)) {
                $this->_validityStart = $model->validityStart;
            }
            if (isset($model->validityEnd)) {
                $this->_validityEnd = $model->validityEnd;
            }
        }
    }

    /**
     * @return string
     */
    public function getSubjectName()
    {
        return $this->_subjectName;
    }

    /**
     * @param string $subjectName
     */
    public function setSubjectName($subjectName)
    {
        $this->_subjectName = $subjectName;
    }

    /**
     * @return bool
     */
    public function getFinal()
    {
        return $this->_final;
    }

    /**
     * @param bool $final
     */
    public function setFinal($final)
    {
        $this->_final = $final;
    }

    /**
     * @return ValidityStarts
     */
    public function getValidityStart()
    {
        return $this->_validityStart;
    }

    /**
     * @param ValidityStarts $validityStart
     */
    public function setValidityStart($validityStart)
    {
        $this->_validityStart = $validityStart;
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
            case 'subjectName':
                return $this->getSubjectName();
            case 'final':
                return $this->getFinal();
            case 'validityStart':
                return $this->getValidityStart();
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
            case 'subjectName':
                return isset($this->_subjectName);
            case 'final':
                return isset($this->_final);
            case 'validityStart':
                return isset($this->_validityStart);
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
            case 'subjectName':
                $this->setSubjectName($value);
                break;
            case 'final':
                $this->setFinal($value);
                break;
            case 'validityStart':
                $this->setValidityStart($value);
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
        if (!isset($this->_subjectName)) {
            throw new \UnexpectedValueException('The "subjectName" was not set.');
        }
        if(isset($this->_subjectName)){
            $model['subjectName'] = $this->_subjectName->toModel();
        }
        $model['final'] = $this->_final;
        $model['validityEnd'] = $this->_validityEnd;
        $model['validityStart'] = $this->_validityStart;
        return $model;
    }
}