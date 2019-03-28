<?php

namespace Lacuna\Amplia;


class ArispCartorioInfo
{
    private $_cns;
    private $_numero;
    private $_nome;
    private $_oficial;
    private $_endereco;
    private $_telefone;
    private $_site;
    private $_email;

    public function __construct($model = null)
    {
        if (isset($model)) {
            $this->_cns = $model->cns ?: null;
            $this->_numero = $model->numero ?: null;
            $this->_nome = $model->nome ?: null;
            $this->_oficial = $model->oficial ?: null;
            $this->_telefone = $model->telefone ?: null;
            $this->_site = $model->site ?: null;
            $this->_email = $model->email ?: null;

            if (isset($model->endereco)) {
                $this->_endereco = new ArispEndereco($model->endereco);
            }
        }
    }

    /**
     * @return string
     */
    public function getCns()
    {
        return $this->_cns;
    }

    /**
     * @param string $cns
     */
    public function setCns($cns)
    {
        $this->_cns = $cns;
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
    public function getOficial()
    {
        return $this->_oficial;
    }

    /**
     * @param string $oficial
     */
    public function setOficial($oficial)
    {
        $this->_oficial = $oficial;
    }

    /**
     * @return ArispEndereco
     */
    public function getEndereco()
    {
        return $this->_endereco;
    }

    /**
     * @param ArispEndereco $endereco
     */
    public function setEndereco($endereco)
    {
        $this->_endereco = $endereco;
    }

    /**
     * @return string
     */
    public function getTelefone()
    {
        return $this->_telefone;
    }

    /**
     * @param string $telefone
     */
    public function setTelefone($telefone)
    {
        $this->_telefone = $telefone;
    }

    /**
     * @return string
     */
    public function getSite()
    {
        return $this->_site;
    }

    /**
     * @param string $site
     */
    public function setSite($site)
    {
        $this->_site = $site;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'cns':
                return $this->getCns();
            case 'numero':
                return $this->getNumero();
            case 'nome':
                return $this->getNome();
            case 'oficial':
                return $this->getOficial();
            case 'endereco':
                return $this->getEndereco();
            case 'telefone':
                return $this->getTelefone();
            case 'site':
                return $this->getSite();
            case 'email':
                return $this->getEmail();
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return null;
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'cns':
                return isset($this->_cns);
            case 'numero':
                return isset($this->_numero);
            case 'nome':
                return isset($this->_nome);
            case 'oficial':
                return isset($this->_oficial);
            case 'endereco':
                return isset($this->_endereco);
            case 'telefone':
                return isset($this->_telefone);
            case 'site':
                return isset($this->_site);
            case 'email':
                return isset($this->_email);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return false;
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'cns':
                $this->setCns($value);
                break;
            case 'numero':
                $this->setNumero($value);
                break;
            case 'nome':
                $this->setNome($value);
                break;
            case 'oficial':
                $this->setOficial($value);
                break;
            case 'endereco':
                $this->setEndereco($value);
                break;
            case 'telefone':
                $this->setTelefone($value);
                break;
            case 'site':
                $this->setSite($value);
                break;
            case 'email':
                $this->setEmail($value);
                break;
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
        }
    }

    public function toModel()
    {
        if (!isset($this->_cns)) {
            throw new \UnexpectedValueException('The "cns" field is not set.');
        }
        if (!isset($this->_nome)) {
            throw new \UnexpectedValueException('The "nome" field is not set.');
        }
        if (!isset($this->_oficial)) {
            throw new \UnexpectedValueException('The "oficial" field is not set.');
        }

        $model = [
            'cns' => $this->_cns,
            'numero' => $this->_numero,
            'nome' => $this->_nome,
            'oficial' => $this->_oficial,
            'telefone' => $this->_telefone,
            'site' => $this->_site,
            'email' => $this->_email,
        ];
        if (isset($this->_endereco)) {
            $model['endereco'] = new ArispEndereco($this->_endereco);
        }
        return $model;
    }
}