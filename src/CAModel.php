<?php

namespace Lacuna\Amplia;

/**
 * Class CAModel
 * @package Lacuna\Amplia
 *
 * @property $Certificate CertificateInfo
 * @property $InitialCertificateNumber int
 * @property $InitialCrlNumber int
 * @property $CrlIssuePeriod int
 * @property $CrlIssueValidity int
 * @property $CanDelete bool
 * @property $CertificatesIssued int
 * @property $CrlsIssued int
 * @property $CertificateContent array
 */
class CAModel extends CASummary
{
    /**
     * @private
     * @var CertificateInfo
     */
    private $_certificate;

    /**
     * @private
     * @var int
     */
    private $_initialCertificateNumber;

    /**
     * @private
     * @var int
     */
    private $_initialCrlNumber;

    /**
     * @private
     * @var int
     */
    private $_crlIssuePeriod;

    /**
     * @private
     * @var int
     */
    private $_crlIssueValidity;

    /**
     * @private
     * @var bool
     */
    private $_canDelete;

    /**
     * @private
     * @var int
     */
    private $_certificatesIssued;

    /**
     * @private
     * @var int
     */
    private $_crlsIssued;

    /**
     * @private
     * @var string
     */
    private $_certificateContent;


    /**
     * CAModel constructor.
     * @param mixed $model
     */
    public function __construct($model = null)
    {
        parent::__construct($model);
        if (isset($model)) {
            if (isset($model->certificate)) {
                $this->_certificate = new CertificateInfo($model->certificate);
            }
            if (isset($model->initialCertificateNumber)) {
                $this->_initialCertificateNumber = $model->initialCertificateNumber;
            }
            if (isset($model->initialCrlNumber)) {
                $this->_initialCrlNumber = $model->initialCrlNumber;
            }
            if (isset($model->crlIssuePeriod)) {
                $this->_crlIssuePeriod = $model->crlIssuePeriod;
            }
            if (isset($model->crlsIssued)) {
                $this->_crlsIssued = $model->crlsIssued;
            }
            if (isset($model->certificateContent)) {
                $this->_certificateContent = $model->certificateContent;
            }
        }
    }

    /**
     * @return CertificateInfo
     */
    public function getCertificate(){
        return $this->_certificate;
    }

    /**
     * @param CertificateInfo $cert
     */
    public function setCertificate($cert){
        $this->_certificate = $cert;
    }

    /**
     * @return int
     */
    public function getInitialCertificateNumber(){
        return $this->_initialCertificateNumber;
    }

    /**
     * @param int $num
     */
    public function setInitialCertificateNumber($num){
        $this->_initialCertificateNumber = $num;
    }

    /**
     * @return int
     */
    public function getInitialCrlNumber(){
        return $this->_initialCrlNumber;
    }

    /**
     * @param int $num
     */
    public function setInitialCrlNumber($num){
        $this->_initialCrlNumber = $num;
    }

    /**
     * @return int
     */
    public function getCrlIssuePeriod(){
        return $this->_crlIssuePeriod;
    }

    /**
     * @param int $period
     */
    public function setCrlIssuePeriod($period){
        $this->_crlIssuePeriod = $period;
    }

    /**
     * @return int
     */
    public function getCrlsIssued(){
        return $this->_crlsIssued;
    }

    /**
     * @param int $num
     */
    public function setCrlsIssued($num){
        $this->_crlsIssued = $num;
    }

    /**
     * @return string
     */
    public function getCertificateContent(){
        return $this->_certificateContent;
    }

    /**
     * @param string $content
     */
    public function setCertificateContent($content){
        $this->_certificateContent = $content;
    }

    /**
     * @return bool
     */
    public function getCanDelete(){
        return $this->_canDelete;
    }

    /**
     * @param bool $canDelete
     */
    public function setCanDelete($canDelete){
        $this->_canDelete = $canDelete;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'certificate':
                return $this->getCertificate();
            case 'initialCertificateNumber':
                return $this->getInitialCertificateNumber();
            case 'initialCrlNumber':
                return $this->getInitialCrlNumber();
            case 'crlIssuePeriod':
                return $this->getCrlIssuePeriod();
            case 'crlIssueValidity':
                return $this->getCrlIssueValidity();
            case 'canDelete':
                return $this->getCanDelete();
            case 'certificatesIssued':
                return $this->getCertificatesIssued();
            case 'crlsIssued':
                return $this->getCrlsIssued();
            case 'certificateContent':
                return $this->getCertificateContent();
            default:
                return parent::__get($prop);
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'certificate':
                return isset($this->_certificate);
            case 'initialCertificateNumber':
                return isset($this->_initialCertificateNumber);
            case 'initialCrlNumber':
                return isset($this->_initialCrlNumber);
            case 'crlIssuePeriod':
                return isset($this->_crlIssuePeriod);
            case 'crlIssueValidity':
                return isset($this->_crlIssueValidity);
            case 'canDelete':
                return isset($this->_canDelete);
            case 'certificatesIssued':
                return isset($this->_certificatesIssued);
            case 'crlsIssued':
                return isset($this->_crlsIssued);
            case 'certificateContent':
                return isset($this->_certificateContent);
            default:
                return parent::__isset($prop);
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'certificate':
                $this->setCertificate();
                break;
            case 'initialCertificateNumber':
                $this->setInitialCertificateNumber();
                break;
            case 'initialCrlNumber':
                $this->setInitialCrlNumber();
                break;
            case 'crlIssuePeriod':
                $this->setCrlIssuePeriod();
                break;
            case 'crlIssueValidity':
                $this->setCrlIssueValidity();
                break;
            case 'canDelete':
                $this->setCanDelete();
                break;
            case 'certificatesIssued':
                $this->setCertificatesIssued();
                break;
            case 'crlsIssued':
                $this->setCrlsIssued();
                break;
            case 'certificateContent':
                $this->setCertificateContent();
                break;
            default:
                parent::__set($prop, $value);
        }
    }

    public function toModel()
    {
        $model = parent::toModel();
        if (isset($this->_certificate)) {
            $model['certificate'] = $this->_certificate->toModel();
        }
        $model['initialCertificateNumber'] = $this->_initialCertificateNumber;
        $model['initialCrlNumber'] = $this->_initialCrlNumber ;
        $model['crlIssuePeriod'] = $this->_crlIssuePeriod;
        $model['crlIssueValidity'] = $this->_crlIssueValidity;
        $model['canDelete'] = $this->_canDelete;
        $model['certificatesIssued'] = $this->_certificatesIssued;
        $model['crlsIssued'] = $this->_crlsIssued;
        $model['certificateContent'] = $this->_certificateContent;
        return $model;
    }
}