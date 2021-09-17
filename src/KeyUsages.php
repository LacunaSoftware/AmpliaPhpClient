<?php

namespace Lacuna\Amplia;

/**
 * Class KeyUsages
 * @package Lacuna\Amplia
 */
class KeyUsages
{
    const CRL_SIGN = 'CrlSign';
    const DATA_ENCIPHERMENT = 'DataEncipherment';
    const DECIPHER_ONLY = 'DecipherOnly';
    const DIGITAL_SIGNATURE = 'DigitalSignature';
    const ENCIPHER_ONLY = 'EncipherOnly';
    const KEY_AGREEMENT = 'KeyAgreement';
    const KEY_CERT_SIGN = 'KeyCertSign';
    const KEY_ENCIPHERMENT = 'KeyEncipherment';
    const NON_REPUDIATION = 'NonRepudiation';
}