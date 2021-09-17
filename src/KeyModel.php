<?php

namespace Lacuna\Amplia;

/**
 * Class KeyModel
 * @package Lacuna\Amplia
 *
 * @property $CanDelete bool
 * @property $RSAPublicParameters RSAPublicParametersModel
 * @property $Csr string
 * @property $Size int
 * @property $KeyType KeyTypes
 * @property $Curve string
 * 
 */
class KeyModel extends KeySummary
{
    /**
     * @private
     * @var bool
     */
    private $_canDelete;

    /**
     * @private
     * @var RSAPublicParametersModel
     */
    private $_rsaPublicParameters;

    /**
     * @private
     * @var string
     */
    private $_csr;

    /**
     * @private
     * @var int
     */
    private $_size;

    /**
     * @private
     * @var KeyTypes
     */
    private $_keyType;

    /**
     * @private
     * @var string
     */
    private $_curve;

    /**
     * KeyModel constructor.
     * @param mixed $model
     */
    public function __construct($model = null)
    {
        parent::__construct($model);
        if (isset($model)) {
            if (isset($model->canDelete)) {
                $this->_canDelete = $model->canDelete;
            }
            if (isset($model->csr)) {
                $this->_csr = $model->csr;
            }
            if (isset($model->size)) {
                $this->_size = $model->size;
            }
            if (isset($model->keyType)) {
                $this->_keyType = $model->keyType;
            }
            if (isset($model->curve)) {
                $this->_curve = $model->curve;
            }
            if (isset($model->rSAPublicParameters)) {
                $this->_rsaPublicParameters = new RSAPublicParametersModel($model->rSAPublicParameters);
            }
        }
    }

    /**
     * @return bool
     */
    public function getCanDelete()
    {
        return $this->_canDelete;
    }

    /**
     * @param bool $canDelete
     */
    public function setCanDelete($canDelete)
    {
        $this->_canDelete = $canDelete;
    }

    /**
     * @return RSAPublicParametersModel
     */
    public function getRSAPublicParameters()
    {
        return $this->_rsaPublicParameters;
    }

    /**
     * @param RSAPublicParametersModel $canDelete
     */
    public function setRSAPublicParameters($rsaPublicParameters)
    {
        $this->_rsaPublicParameters = $rsaPublicParameters;
    }

    /**
     * @return string
     */
    public function getCrs()
    {
        return $this->_crs;
    }

    /**
     * @param string $crs
     */
    public function setCrs($crs)
    {
        $this->_crs = $crs;
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->_size;
    }

    /**
     * @param string $size
     */
    public function setSize($size)
    {
        $this->_size = $size;
    }

    /**
     * @return KeyTypes
     */
    public function getKeyType()
    {
        return $this->_keyType;
    }

    /**
     * @param KeyTypes $type
     */
    public function setKeyType($type)
    {
        $this->_keyTypes = $type;
    }

    /**
     * @return string
     */
    public function getCurve()
    {
        return $this->_curve;
    }

    /**
     * @param string $curve
     */
    public function setCurve($curve)
    {
        $this->_curve = $curve;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'canDelete':
                return $this->getCanDelete();
            case 'rsaPublicParameters':
                return $this->getRSAPublicParameters();
            case 'crs':
                return $this->getCrs();
            case 'size':
                return $this->getSize();
            case 'keyType':
                return $this->getKeyType();
            case 'curve':
                return $this->getCurve();
            default:
                return parent::__get($prop);
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'canDelete':
                return isset($this->_canDelete);
            case 'rsaPublicParameters':
                return isset($this->_rsaPublicParameters);
            case 'crs':
                return isset($this->_crs);
            case 'size':
                return isset($this->_size);
            case 'keyType':
                return isset($this->_keyType);
            case 'curve':
                return isset($this->_curve);
            default:
                return parent::__isset($prop);
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'canDelete':
                $this->setCanDelete($value);
                break;
            case 'rsaPublicParameters':
                $this->setRSAPublicParameters($value);
                break;
            case 'crs':
                $this->setCrs($value);
                break;
            case 'size':
                $this->setSize($value);
                break;
            case 'keyType':
                $this->setKeyType($value);
                break;
            case 'curve':
                $this->setCurve($value);
                break;
            default:
                parent::__set($prop, $value);
        }
    }

    public function toModel()
    {
        $model = parent::toModel();
        $model['canDelete'] = $this->_canDelete;
        $model['crs'] = $this->_crs;
        $model['size'] = $this->_size;
        $model['keyType'] = $this->_keyType;
        $model['curve'] = $this->_curve;
        if (isset($this->_rsaPublicParameters)) {
            $model['rSAPublicParameters'] = $this->_rsaPublicParameters->toModel();
        }
        return $model;
    }
}