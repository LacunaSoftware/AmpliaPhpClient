<?php

namespace Lacuna\Amplia;

/**
 * Class ArispCertificateParameters
 * @package Lacuna\Amplia
 *
 * @property $nome string
 * @property $cpf string
 * @property $funcao ArispRoles
 * @property $cartorio ArispCartorioInfo
 */
class ArispCertificateParameters extends CertificateParameters
{
    /**
     * @private
     * @var string
     */
    private $_nome;

    /**
     * @private
     * @var string
     */
    private $_cpf;

    /**
     * @private
     * @var string
     */
    private $_funcao;

    /**
     * @private
     * @var ArispCartorioInfo
     */
    private $_cartorio;

    /**
     * ArispCertificateParameters constructor.
     * @param mixed $model
     */
    public function __construct($model = null)
    {
        parent::__construct($model);
        $this->_format = CertificateFormats::ARISP;
        if (isset($model)) {
            if (isset($model->nome)) {
                $this->_nome = $model->nome;
            }
            if (isset($model->cpf)) {
                $this->_cpf = $model->cpf;
            }
            if (isset($model->funcao)) {
                $this->_funcao = $model->funcao;
            }
            if (isset($model->cartorio)) {
                $this->_cartorio = new ArispCartorioInfo($model->cartorio);
            }
        }
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->_nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->_nome = $nome;
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
    public function getFuncao()
    {
        return $this->_funcao;
    }

    /**
     * @param string $funcao
     */
    public function setFuncao($funcao)
    {
        $this->_funcao = $funcao;
    }

    /**
     * @return ArispCartorioInfo
     */
    public function getCartorio()
    {
        return $this->_cartorio;
    }

    /**
     * @param ArispCartorioInfo $cartorio
     */
    public function setCartorio($cartorio)
    {
        $this->_cartorio = $cartorio;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'nome':
                return $this->getNome();
            case 'cpf':
                return $this->getCpf();
            case 'funcao':
                return $this->getFuncao();
            case 'cartorio':
                return $this->getCartorio();
            default:
                return parent::__get($prop);
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'nome':
                return isset($this->_nome);
            case 'cpf':
                return isset($this->_cpf);
            case 'funcao':
                return isset($this->_funcao);
            case 'cartorio':
                return isset($this->_cartorio);
            default:
                return parent::__isset($prop);
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'nome':
                $this->setNome($value);
                break;
            case 'cpf':
                $this->setCpf($value);
                break;
            case 'funcao':
                $this->setFuncao($value);
                break;
            case 'cartorio':
                $this->setCartorio($value);
                break;
            default:
                parent::__set($prop, $value);
        }
    }

    public function toModel()
    {
        if (!isset($this->_nome)) {
            throw new \UnexpectedValueException('The "nome" was not set.');
        }
        if (!isset($this->_cpf)) {
            throw new \UnexpectedValueException('The "cpf" was not set.');
        }
        if (!isset($this->_funcao)) {
            throw new \UnexpectedValueException('The "funcao" was not set.');
        }
        if (!isset($this->_cartorio)) {
            throw new \UnexpectedValueException('The "cartorio" was not set.');
        }
        $model = parent::toModel();
        $model['nome'] = $this->_nome;
        $model['cpf'] = $this->_cpf;
        $model['funcao'] = $this->_funcao;
        if (isset($this->_cartorio)) {
            $model['cartorio'] = $this->_cartorio->toModel();
        }
        return $model;
    }
}