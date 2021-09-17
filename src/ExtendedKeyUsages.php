<?php

namespace Lacuna\Amplia;

/**
 * Class ExtendedKeyUsages
 * @package Lacuna\Amplia
 */
class ExtendedKeyUsages
{
    const CLIENT_AUTH = 'ClientAuth';
    const SERVER_AUTH = 'ServerAuth';
    const CODE_SIGNING = 'CodeSigning';
    const EMAIL_PROTECTION = 'EmailProtection';
    const TIME_STAMPING = 'TimeStamping';
    const OCSP_SIGNING = 'OcspSigning';
    const IPSEC_END_SYSTEM = 'IpsecEndSystem';
    const IPSEC_TUNNEL = 'IpsecTunnel';
    const IPSEC_USER = 'IpsecUser';
    const ANY = 'Any';
}