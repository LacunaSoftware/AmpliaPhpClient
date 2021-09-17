<?php

namespace Lacuna\Amplia;

/**
 * Class CASummary
 * @package Lacuna\Amplia
 *
 * @property $id uuid
 * @property $keyId uuid
 * @property $certificateId uuid
 * @property $subscriptionId uuid
 * @property $name string
 * @property $subjectDisplayName string
 * @property $isActive bool
 * @property $isFinal bool
 * @property $kind CertificateKinds
 *
 */
class CASummary
{
    /**
     * @private
     * @var string
     */
    private $_id;

    /**
     * @private
     * @var string
     */
    private $_keyId;

    /**
     * @private
     * @var string
     */
    private $_certificateId;

    /**
     * @private
     * @var string
     */
    private $_subscriptionId;

    /**
     * @private
     * @var string
     */
    private $_name;

    /**
     * @private
     * @var string
     */
    private $_subjectDisplayName;

    /**
     * @private
     * @var bool
     */
    private $_isActive;

    /**
     * @private
     * @var bool
     */
    private $_isFinal;

    /**
     * @private
     * @var CertificateKinds
     */
    private $_kind;

    public function __construct($model = null)
    {
        parent::__construct($model);
        if (isset($model)) {
            if (isset($model->id)) {
                $this->_id = $model->id;
            }
            if (isset($model->keyId)) {
                $this->_keyId = $model->keyId;
            }
            if (isset($model->certificateId)) {
                $this->_certificateId = $model->certificateId;
            }
            if (isset($model->subscriptionId)) {
                $this->_subscriptionId = $model->subscriptionId;
            }
            if (isset($model->name)) {
                $this->_name = $model->name;
            }
            if (isset($model->subjectDisplayName)) {
                $this->_subjectDisplayName = $model->subjectDisplayName;
            }
            if (isset($model->isActive)) {
                $this->_isActive = $model->isActive;
            }
            if (isset($model->isFinal)) {
                $this->_isFinal = $model->isFinal;
            }
            if (isset($model->kind)) {
                $this->_kind = $model->kind;
            }
        }
    }

    /**
     * @return string
     */
    public function getId(){
        return $this->_id;
    }

    /**
     * @param string $id
     */
    public function setId($id){
        $this->_id = $id;
    }

    /**
     * @return string
     */
    public function getKeyId(){
        return $this->_keyId;
    }

    /**
     * @param string $id
     */
    public function setKeyId($id){
        $this->_keyId = $id;
    }

    /**
     * @return string
     */
    public function getCertificateId(){
        return $this->_certificateId;
    }

    /**
     * @param string $id
     */
    public function setCertificateId($id){
        $this->_certificateId = $id;
    }

    /**
     * @return string
     */
    public function getSubscriptionId(){
        return $this->_subscriptionId;
    }

    /**
     * @param string $id
     */
    public function setSubscriptionId($id){
        $this->_subscriptionId = $id;
    }

    /**
     * @return string
     */
    public function getName(){
        return $this->_name;
    }

    /**
     * @param string $name
     */
    public function setName($name){
        $this->_name = $name;
    }

    /**
     * @return string
     */
    public function getSubjectDisplayName(){
        return $this->_subjectDisplayName;
    }

    /**
     * @param string $subjectDisplayName
     */
    public function setSubjectDisplayName($subjectDisplayName){
        $this->_subjectDisplayName = $subjectDisplayName;
    }

    /**
     * @return bool
     */
    public function getIsActive(){
        return $this->_isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive($isActive){
        $this->_isActive = $isActive;
    }

    /**
     * @return bool
     */
    public function getIsFinal(){
        return $this->_isFinal;
    }

    /**
     * @param bool $isFinal
     */
    public function setIsFinal($isFinal){
        $this->_isFinal = $isFinal;
    }

    /**
     * @return CertificateKinds
     */
    public function getKind(){
        return $this->_kind;
    }

    /**
     * @param CertificateKinds $kind
     */
    public function setKind($kind){
        $this->_kind = $kind;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'id':
                return $this->getId();
            case 'keyId':
                return $this->getKeyId();
            case 'certificateId':
                return $this->getCertificateId();
            case 'subscriptionId':
                return $this->getSubscriptionId();
            case 'name':
                return $this->getName();
            case 'subjectDisplayName':
                return $this->getSubjectDisplayName();
            case 'isActive':
                return $this->getIsActive();
            case 'isFinal':
                return $this->getIsFinal();
            case 'kind':
                return $this->getKind();
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return null;
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'id':
                return isset($this->_id);
            case 'keyId':
                return isset($this->_keyId);
            case 'certificateId':
                return isset($this->_certificateId);
            case 'subscriptionId':
                return isset($this->_subscriptionId);
            case 'name':
                return isset($this->_name);
            case 'subjectDisplayName':
                return isset($this->_subjectDisplayName);
            case 'isActive':
                return isset($this->_isActive);
            case 'isFinal':
                return isset($this->_isFinal);
            case 'kind':
                return isset($this->_kind);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return false;
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'id':
                $this->setId($value);
                break;
            case 'keyId':
                $this->setKeyId($value);
                break;
            case 'certificateId':
                $this->setCertificateId($value);
                break;
            case 'subscriptionId':
                $this->setSubscriptionId($value);
                break;
            case 'name':
                $this->setName($value);
                break;
            case 'subjectDisplayName':
                $this->setSubjectDisplayName($value);
                break;
            case 'isActive':
                $this->setIsActive($value);
                break;
            case 'isFinal':
                $this->setIsFinal($value);
                break;
            case 'kind':
                $this->setKind($value);
                break;
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
        }
    }

    public function toModel()
    {
        $model['id'] = $this->_id;
        $model['keyId'] = $this->_keyId;
        $model['certificateId'] = $this->_certificateId;
        $model['subscriptionId'] = $this->_subscriptionId;
        $model['name'] = $this->_name;
        $model['subjectDisplayName'] = $this->_subjectDisplayName;
        $model['isActive'] = $this->_isActive;
        $model['isFinal'] = $this->_isFinal;
        $model['kind'] = $this->_kind;
        return $model;
    }
}