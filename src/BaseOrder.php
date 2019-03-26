<?php

namespace Lacuna\Amplia;


class BaseOrder
{
    private $_id;
    private $_caId;
    private $_templateId;
    private $_alias;
    private $_emailAddress;
    private $_certificateId;
    private $_status;

    public function __construct($model = null)
    {
        if (isset($model)) {
            $this->_id = $model['id'] ?: null;
            $this->_caId = $model['caId'] ?: null;
            $this->_templateId = $model['templateId'] ?: null;
            $this->_alias = $model['alias'] ?: null;
            $this->_emailAddress = $model['emailAddress'] ?: null;
            $this->_certificateId = $model['certificateId'] ?: null;
            $this->_status = $model['status'] ?: null;
        }
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return null
     */
    public function getCAId()
    {
        return $this->_caId;
    }

    /**
     * @param null $caId
     */
    public function setCAId($caId)
    {
        $this->_caId = $caId;
    }

    /**
     * @return null
     */
    public function getTemplateId()
    {
        return $this->_templateId;
    }

    /**
     * @param null $templateId
     */
    public function setTemplateId($templateId)
    {
        $this->_templateId = $templateId;
    }

    /**
     * @return null
     */
    public function getAlias()
    {
        return $this->_alias;
    }

    /**
     * @param null $alias
     */
    public function setAlias($alias)
    {
        $this->_alias = $alias;
    }

    /**
     * @return null
     */
    public function getEmailAddress()
    {
        return $this->_emailAddress;
    }

    /**
     * @param null $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->_emailAddress = $emailAddress;
    }

    /**
     * @return null
     */
    public function getCertificateId()
    {
        return $this->_certificateId;
    }

    /**
     * @param null $certificateId
     */
    public function setCertificateId($certificateId)
    {
        $this->_certificateId = $certificateId;
    }

    /**
     * @return null
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @param null $status
     */
    public function setStatus($status)
    {
        $this->_status = $status;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'id':
                return $this->getId();
            case 'caId':
                return $this->getCAId();
            case 'templateId':
                return $this->getTemplateId();
            case 'alias':
                return $this->getAlias();
            case 'emailAddress':
                return $this->getEmailAddress();
            case 'certificateId':
                return $this->getCertificateId();
            case 'status':
                return $this->getStatus();
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
            case 'caId':
                return isset($this->_caId);
            case 'templateId':
                return isset($this->_templateId);
            case 'alias':
                return isset($this->_alias);
            case 'emailAddress':
                return isset($this->_emailAddress);
            case 'certificateId':
                return isset($this->_certificateId);
            case 'status':
                return isset($this->_status);
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
            case 'caId':
                $this->setCAId($value);
                break;
            case 'templateId':
                $this->setTemplateId($value);
                break;
            case 'alias':
                $this->setAlias($value);
                break;
            case 'emailAddress':
                $this->setEmailAddress($value);
                break;
            case 'certificateId':
                $this->setCertificateId($value);
                break;
            case 'status':
                $this->setStatus($value);
                break;
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
        }
    }

    public function toModel()
    {
        return [
            'id' => $this->_id,
            'caId' => $this->_caId,
            'templateId' => $this->_templateId,
            'alias' => $this->_alias,
            'emailAddress' => $this->_emailAddress,
            'certificateId' => $this->_certificateId,
            'status' => $this->_status
        ];
    }
}