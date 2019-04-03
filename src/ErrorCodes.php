<?php

namespace Lacuna\Amplia;

/**
 * Class ErrorCodes
 * @package Lacuna\Amplia
 */
class ErrorCodes
{
    const UNKNOWN = 'Unknown';
    const REPOSITORY_NOT_FOUND = 'RepositoryNotFound';
    const ORDER_NOT_FOUND = 'OrderNotFound';
    const CERTIFICATE_NOT_FOUND = 'CertificateNotFound';
    const TEMPLATE_NOT_FOUND = 'TemplateNotFound';
    const BAD_BASE64_STRING = 'BadBase64String';
    const BAD_ALGORITHM = 'BadAlgorithm';
    const BAD_CERTIFICATE = 'BadCertificate';
    const CERTIFICATE_ALREADY_REVOKED = 'CertificateAlreadyRevoked';
    const ORDER_ALREADY_FULFILLED = 'OrderAlreadyFulfilled';
    const ACCESS_DENIED_TO_ORDER = 'AccessDeniedToOrder';
    const ACCESS_DENIED_TO_CERTIFICATE = 'AccessDeniedToCertificate';
    const ACCESS_DENIED_TO_APPLICATION = 'AccessDeniedToApplication';
    const ACCESS_DENIED_TO_REPOSITORY = 'AccessDeniedToRepository';
    const SUBSCRIPTION_NOT_FOUND = 'SubscriptionNotFound';
    const CA_NOT_FOUND = 'CANotFound';
    const ACCESS_DENIED_TO_CA = 'AccessDeniedToCA';
    const SUBSCRIPTION_REQUIRED = 'SubscriptionRequired';
    const APPLICATION_NOT_FOUND = 'ApplicationNotFound';
    const BAD_SUBSCRIPTION = 'BadSubscription';
    const NORMAL_SUBSCRIPTION_REQUIRED = 'NormalSubscriptionRequired';
    const NOT_REGISTERED = 'NotRegistered';
    const AGENT_NOT_FOUND = 'AgentNotFound';
    const AGENT_IS_NOT_USER = 'AgentIsNotUser';
    const INVITE_NOT_FOUND = 'InviteNotFound';
    const APPLICATION_KEY_NOT_FOUND = 'ApplicationKeyNotFound';
    const APPLICATION_DELETED = 'ApplicationDeleted';
    const APPLICATION_NAME_EXISTS = 'ApplicationNameExists';
    const USER_NOT_FOUND = 'UserNotFound';
    const INVALID_CLAIM_CODE = 'InvalidClaimCode';
    const SEARCH_NOT_SUPPORTED = 'SearchNotSupported';
    const EMAIL_DISABLED = 'EmailDisabled';
    const HTTPS_REQUIRED = 'HttpsRequired';
    const KEY_NOT_FOUND = 'KeyNotFound';
    const CANNOT_DELETE_KEY_HAVING_CA = 'CannotDeleteKeyHavingCA';
    const BAD_KEY_STORE = 'BadKeyStore';
    const BAD_KEY_STORE_PARAMETERS = 'BadKeyStoreParameters';
    const KEY_STORE_PARAMETERS_FAILED_VALIDATION = 'KeyStoreParametersFailedValidation';
    const KEY_DELETED = 'KeyDeleted';
    const KEY_NAME_EXISTS = 'KeyNameExists';
    const KEY_SIZE_NOT_SUPPORTED = 'KeySizeNotSupported';
    const DIGEST_ALGORITHM_NOT_SUPPORTED = 'DigestAlgorithmNotSupported';
    const NAME_TYPE_STRATEGY_NOT_SUPPORTED = 'NameTypeStrategyNotSupported';
    const BAD_NAME_SPEC = 'BadNameSpec';
    const BAD_REQUEST = 'BadRequest';
    const CERTIFICATE_INCOMPATIBLE_WITH_KEY = 'CertificateIncompatibleWithKey';
    const CSR_REQUIRED = 'CsrRequired';
    const CANNOT_CHANGE_CA_CONFIG = 'CannotChangeCAConfig';
    const CA_NAME_EXISTS = 'CANameExists';
    const CA_NOT_ACTIVE = 'CANotActive';
    const CANNOT_DELETE_CA = 'CannotDeleteCA';
    const CA_IS_FINAL = 'CAIsFinal';
    const KEY_ALREADY_ASSOCIATED = 'KeyAlreadyAssociated';
    const SUBSCRIPTION_MISMATCH = 'SubscriptionMismatch';
    const CANNOT_INFER_CERTIFICATE = 'CannotInferCertificate';
    const ISSUE_SESSION_MISSING = 'IssueSessionMissing';
    const ISSUE_SESSION_EXPIRED = 'IssueSessionExpired';
    const INVALID_ISSUE_SESSION = 'InvalidIssueSession';
    const NO_MORE_CONFIRM_ATTEMPTS_REMAINING = 'NoMoreConfirmAttemptsRemaining';
    const EXPIRES_AFTER_ISSUER = 'ExpiresAfterIssuer';
    const CRL_NOT_FOUND = 'CrlNotFound';
    const INVALID_CSR = 'InvalidCsr';
    const CA_REQUIRED = 'CARequired';
    const NO_SUITABLE_TEMPLATE_FOUND = 'NoSuitableTemplateFound';
    const KIND_REQUIRED = 'KindRequired';
    const BAD_DATE = 'BadDate';
    const ORDER_HAS_NO_CA = 'OrderHasNoCA';
    const ORDER_HAS_NO_TEMPLATE = 'OrderHasNoTemplate';
    const TEMPLATE_FORBIDS_CUSTOM_Validity = 'TemplateForbidsCustomValidity';
    const VALIDITY_REQUIRED = 'ValidityRequired';
    const COPYING_FROM_CERTIFICATE_NOT_SUPPORTED = 'CopyingFromCertificateNotSupported';
    const DNS_NAMES_REQUIRED = 'DnsNamesRequired';
    const BAD_DNS_NAME = 'BadDnsName';
    const CERTIFICATE_FORMAT_MISMATCH = 'CertificateFormatMismatch';
    const BAD_CSR = 'BadCsr';
    const KEY_TYPE_NOT_SUPPORTED = 'KeyTypeNotSupported';
    const BAD_KEY_SIZE = 'BadKeySize';
    const TEMPLATE_DELETED = 'TemplateDeleted';
    const TEMPLATE_NAME_EXISTS = 'TemplateNameExists';
    const BAD_TEMPLATE_PARAMETERS = 'BadTemplateParameters';
    const TEMPLATE_FORBIDS_PARAMETERS = 'TemplateForbidsParameter';
    const CERTIFICATE_KIND_NOT_FOUND = 'CertificateKindNotSupported';
    const CSR_NOT_EXPECTED = 'CsrNotExpected';
    const TEMPLATE_KIND_MISMATCH = 'TemplateKindMismatch';
    const NOT_PK_CERTIFICATE_ORDER = 'NotPKCertificateOrder';
    const BAD_ORDER_PARAMETERS = 'BadOrderParameters';
    const FORMAT_REQUIRED = 'FormatRequired';
    const INVALID_CPF = 'InvalidCpf';
    const INVALID_CNPJ = 'InvalidCnpj';
    const INVALID_PHONE_NUMBER = 'InvalidPhoneNumber';
    const ORDER_LOCKED = 'OrderLocked';
    const ALREADY_CONFIRMED = 'AlreadyConfirmed';
    const NOT_CONFIRMED = 'NotConfirmed';
    const SMS_DISABLED = 'SmsDisabled';
    const NO_EMAIL_ADDRESS = 'NoEmailAddress';
}