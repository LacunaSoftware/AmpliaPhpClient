<?php

namespace Lacuna\Amplia;

/**
 * Class BaseOrder
 * @package Lacuna\Amplia
 *
 * @property $id string
 * @property $caId string
 * @property $templateId string
 * @property $alias string
 * @property $emailAddress string
 * @property $certificateId string
 * @property $status string
 */
class BaseOrder
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
    private $_alias;

    /**
     * @private
     * @var string
     */
    private $_emailAddress;

    /**
     * @private
     * @var string
     */
    private $_certificateId;

    /**
     * @private
     * @var string
     */
    private $_status;

    /**
     * BaseOrder constructor.
     * @param mixed $model
     */
    public function __construct($model = null)
    {
        if (isset($model)) {
            if (isset($model->id)) {
                $this->_id = $model->id;
            }
            if (isset($model->caId)) {
                $this->_caId = $model->caId;
            }
            if (isset($model->templateId)) {
                $this->_templateId = $model->templateId;
            }
            if (isset($model->alias)) {
                $this->_alias = $model->alias;
            }
            if (isset($model->emailAddress)) {
                $this->_emailAddress = $model->emailAddress;
            }
            if (isset($model->certificateId)) {
                $this->_certificateId = $model->certificateId;
            }
            if (isset($model->status)) {
                $this->_status = $model->status;
            }
        }
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->_id = $id;
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
    public function getAlias()
    {
        return $this->_alias;
    }

    /**
     * @param string $alias
     */
    public function setAlias($alias)
    {
        $this->_alias = $alias;
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
    public function getCertificateId()
    {
        return $this->_certificateId;
    }

    /**
     * @param string $certificateId
     */
    public function setCertificateId($certificateId)
    {
        $this->_certificateId = $certificateId;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @param string $status
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