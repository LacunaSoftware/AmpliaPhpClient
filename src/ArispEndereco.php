<?php

namespace Lacuna\Amplia;

/**
 * Class ArispEndereco
 * @package Lacuna\Amplia
 *
 * @property $logradouro string
 * @property $numero string
 * @property $complemento string
 * @property $distrito string
 * @property $comarca string
 * @property $municipio string
 * @property $estado string
 * @property $cep string
 */
class ArispEndereco
{
    /**
     * @private
     * @var string
     */
    private $_logradouro;

    /**
     * @private
     * @var string
     */
    private $_numero;

    /**
     * @private
     * @var string
     */
    private $_complemento;

    /**
     * @private
     * @var string
     */
    private $_distrito;

    /**
     * @private
     * @var string
     */
    private $_comarca;

    /**
     * @private
     * @var string
     */
    private $_municipio;

    /**
     * @private
     * @var string
     */
    private $_estado;

    /**
     * @private
     * @var string
     */
    private $_cep;

    /**
     * ArispEndereco constructor.
     * @param mixed $model
     */
    public function __construct($model = null)
    {
        if (isset($model)) {
            if (isset($model->logradouro)) {
                $this->_logradouro = $model->logradouro;
            }
            if (isset($model->numero)) {
                $this->_numero = $model->numero;
            }
            if (isset($model->complemento)) {
                $this->_complemento = $model->complemento;
            }
            if (isset($model->distrito)) {
                $this->_distrito = $model->distrito;
            }
            if (isset($model->comarca)) {
                $this->_comarca = $model->comarca;
            }
            if (isset($model->municipio)) {
                $this->_municipio = $model->municipio;
            }
            if (isset($model->estado)) {
                $this->_estado = $model->estado;
            }
            if (isset($model->cep)) {
                $this->_cep = $model->cep;
            }
        }
    }

    /**
     * @return string
     */
    public function getLogradouro()
    {
        return $this->_logradouro;
    }

    /**
     * @param string $logradouro
     */
    public function setLogradouro($logradouro)
    {
        $this->_logradouro = $logradouro;
    }

    /**
     * @return string
     */
    public function getNumero()
    {
        return $this->_numero;
    }

    /**
     * @param string $numero
     */
    public function setNumero($numero)
    {
        $this->_numero = $numero;
    }

    /**
     * @return string
     */
    public function getComplemento()
    {
        return $this->_complemento;
    }

    /**
     * @param string $complemento
     */
    public function setComplemento($complemento)
    {
        $this->_complemento = $complemento;
    }

    /**
     * @return string
     */
    public function getDistrito()
    {
        return $this->_distrito;
    }

    /**
     * @param string $distrito
     */
    public function setDistrito($distrito)
    {
        $this->_distrito = $distrito;
    }

    /**
     * @return string
     */
    public function getComarca()
    {
        return $this->_comarca;
    }

    /**
     * @param string $comarca
     */
    public function setComarca($comarca)
    {
        $this->_comarca = $comarca;
    }

    /**
     * @return string
     */
    public function getMunicipio()
    {
        return $this->_municipio;
    }

    /**
     * @param string $municipio
     */
    public function setMunicipio($municipio)
    {
        $this->_municipio = $municipio;
    }

    /**
     * @return string
     */
    public function getEstado()
    {
        return $this->_estado;
    }

    /**
     * @param string $estado
     */
    public function setEstado($estado)
    {
        $this->_estado = $estado;
    }

    /**
     * @return string
     */
    public function getCep()
    {
        return $this->_cep;
    }

    /**
     * @param string $cep
     */
    public function setCep($cep)
    {
        $this->_cep = $cep;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'logradouro':
                return $this->getLogradouro();
            case 'numero':
                return $this->getNumero();
            case 'complemento':
                return $this->getComplemento();
            case 'distrito':
                return $this->getDistrito();
            case 'comarca':
                return $this->getComarca();
            case 'municipio':
                return $this->getMunicipio();
            case 'estado':
                return $this->getEstado();
            case 'cep':
                return $this->getCep();
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return null;
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'logradouro':
                return isset($this->_logradouro);
            case 'numero':
                return isset($this->_numero);
            case 'complemento':
                return isset($this->_complemento);
            case 'distrito':
                return isset($this->_distrito);
            case 'comarca':
                return isset($this->_comarca);
            case 'municipio':
                return isset($this->_municipio);
            case 'estado':
                return isset($this->_estado);
            case 'cep':
                return isset($this->_cep);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return false;
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'logradouro':
                $this->setLogradouro($value);
                break;
            case 'numero':
                $this->setNumero($value);
                break;
            case 'complemento':
                $this->setComplemento($value);
                break;
            case 'distrito':
                $this->setDistrito($value);
                break;
            case 'comarca':
                $this->setComarca($value);
                break;
            case 'municipio':
                $this->setMunicipio($value);
                break;
            case 'estado':
                $this->setEstado($value);
                break;
            case 'cep':
                $this->setCep($value);
                break;
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
        }
    }

    public function toModel()
    {
        if (!isset($this->_logradouro)) {
            throw new \UnexpectedValueException('The "logradouro" field was not set.');
        }
        if (!isset($this->_municipio)) {
            throw new \UnexpectedValueException('The "municipio" field was not set.');
        }
        if (!isset($this->_estado)) {
            throw new \UnexpectedValueException('The "estado" field was not set.');
        }

        return [
            'logradouro' => $this->_logradouro,
            'numero' => $this->_numero,
            'complemento' => $this->_complemento,
            'distrito' => $this->_distrito,
            'comarca' => $this->_comarca,
            'municipio' => $this->_municipio,
            'estado' => $this->_estado,
            'cep' => $this->_cep
        ];
    }
}