<?php

namespace Lacuna\Amplia;

/**
 * Class KeySummary
 * @package Lacuna\Amplia
 *
 * @property $id string
 * @property $subscriptionId string
 * @property $name string
 * @property $associatedCAId string
 */
class KeySummary
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
    private $_associatedCAId;

    /**
     * KeySummary constructor.
     * @param mixed $model
     */
    public function __construct($model = null)
    {
        if (isset($model)) {
            if (isset($model->id)) {
                $this->_id = $model->id;
            }
            if (isset($model->subscriptionId)) {
                $this->_subscriptionId = $model->subscriptionId;
            }
            if (isset($model->name)) {
                $this->_name = $model->name;
            }
            if (isset($model->associatedCAId)) {
                $this->_associatedCAId = $model->associatedCAId;
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
    public function getSubscriptionId()
    {
        return $this->_subscriptionId;
    }

    /**
     * @param string $id
     */
    public function setSubscriptionId($id)
    {
        $this->_subscriptionId = $id;
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
    public function getAssociatedCAId()
    {
        return $this->_associatedCAId;
    }

    /**
     * @param string $id
     */
    public function setAssociatedCAId($id)
    {
        $this->_associatedCAId = $id;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'id':
                return $this->getId();
            case 'subscriptionId':
                return $this->getSubscriptionId();
            case 'name':
                return $this->getName();
            case 'associatedCAId':
                return $this->getAssociatedCAId();
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
            case 'subscriptionId':
                return isset($this->_subscriptionId);
            case 'name':
                return isset($this->_name);
            case 'associatedCAId':
                return isset($this->_associatedCAId);
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
            case 'subscriptionId':
                $this->setSubscriptionId($value);
                break;
            case 'name':
                $this->setName($value);
                break;
            case 'associatedCAId':
                $this->setAssociatedCAId($value);
                break;
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
        }
    }

    public function toModel()
    {
        $model['id'] = $this->_id;
        $model['subscriptionId'] = $this->_subscriptionId;
        $model['name'] = $this->_name;
        $model['associatedCAId'] = $this->_associatedCAId;
        return $model;
    }
}