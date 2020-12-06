<?php

namespace Lacuna\Amplia;

/**
 * Class AmpliaClient
 * @package Lacuna\Amplia
 *
 * The class responsible for perform the requests to Lacuna Software's Amplia.
 * Amplia is used to provide certificate lifecycle to applications.
 *
 * @property $endpointUri string The Amplia's endpoint URI to be accessed by
 *           this client.
 * @property $apiKey string The Amplia's API KEY to be used on every request to
 *           Amplia.
 * @property $usePhpCAInfo bool Option to choose the PHP configuration
 *           "curl.cainfo" in order to inform the trusted CA list.
 * @property $caInfoPath string Path to the trusted CA list file cacert.pem.
 */
class AmpliaClient
{
    /**
     * @private
     * @const
     * @var array
     *
     * API routes list that relates the provided parameters' type with a URL
     * route to Amplia.
     */
    private static $TYPED_API_ROUTES = [
        CertificateFormats::PKI_BRAZIL => 'pki-brazil',
        CertificateFormats::SSL => 'ssl',
        CertificateFormats::CNB => 'cnb',
        CertificateFormats::CNB_CA => 'cnb-ca',
        CertificateFormats::CIE => 'cie',
        CertificateFormats::ARISP => 'arisp'
    ];

    /**
     * @private
     * @var string
     *
     * The Amplia's endpoint URI to be accessed by this client.
     */
    private $_endpointUri;

    /**
     * @private
     * @var string
     *
     * The Amplia's API KEY to be used on every request to Amplia.
     */
    private $_apiKey;

    /**
     * @private
     * @var RestClient
     *
     * The REST client used to perform the HTTP requests.
     */
    private $_restClient;

    /**
     * @private
     * @var bool
     */
    private $_usePhpCAInfo;

    /**
     * @private
     * @var string
     */
    private $_caInfoPath;

    /**
     * AmpliaClient constructor.
     *
     * @param $endpointUri string The Amplia's endpoint URI to be accessed by
     *        this client.
     * @param $apiKey string The Amplia's API KEY to be used on every request to
     *        Amplia.
     * @param bool $usePhpCAInfo
     * @param string|null $caInfoPath
     */
    public function __construct(
        $endpointUri,
        $apiKey,
        $usePhpCAInfo = false,
        $caInfoPath = null
    ) {
        $this->_endpointUri = $endpointUri;
        $this->_apiKey = $apiKey;
        $this->_usePhpCAInfo = $usePhpCAInfo;
        $this->_caInfoPath = $caInfoPath;
    }

    /**
     * Creates an order to issue a certificate on Amplia.
     *
     * @param $request CreateOrderRequest The request used to create an order.
     * @return Order The created order.
     * @throws AmpliaException When a error has occurs on Amplia.
     * @throws OrderLockedException When the required order is locked.
     * @throws RestErrorException When an unexpected error occurs when
     *         requesting Amplia.
     * @throws RestUnreachableException When the client doesn't reach the Amplia
     *         endpoint.
     */
    public function createOrder($request)
    {
        if (!isset($request)) {
            throw new \InvalidArgumentException('The provided "request" cannot have a null value.');
        }
        if (!isset($request->parameters)) {
            throw new \InvalidArgumentException('The provided "request" must have a valid "parameters" field.');
        }
        $client = $this->_getRestClient();

        $format = $request->parameters->format;
        $typeRouteSegment = $this->_getTypedRouteSegment($format);

        $response = $client->post("api/orders/{$typeRouteSegment}",
            $request->toModel());
        return new Order($response->body);
    }

    /**
     * Retrieves an order from Amplia.
     *
     * @param $orderId string The order's id, which is used to identify the
     *        order on Amplia.
     * @return Order The retrieved order.
     * @throws AmpliaException When a error has occurs on Amplia.
     * @throws OrderLockedException When the required order is locked.
     * @throws RestErrorException When an unexpected error occurs when
     *         requesting Amplia.
     * @throws RestUnreachableException When the client doesn't reach the Amplia
     *         endpoint.
     */
    public function getOrder($orderId)
    {
        if (!$orderId) {
            throw new \InvalidArgumentException('The provided "orderId" cannot have a null value.');
        }
        $client = $this->_getRestClient();

        $response = $client->get("api/v2/orders/{$orderId}");
        return new Order($response->body);
    }

    /**
     * Retrieves an issuing link for an order to redirect the user to a
     * application that will perform the issuing the certificate directly on the
     * user's machine. It's possible to pass the return URL, that Amplia will
     * return after issuing the certificate.
     *
     * @param $orderId string The order's id, which is used to identify the
     *        order on Amplia.
     * @param string|null $returnUrl The return URL, which is used to redirect
     *        the user after issuing the certificate.
     * @return string The issuing link to redirect the user to issue its
     *         certificate.
     * @throws AmpliaException When a error has occurs on Amplia.
     * @throws OrderLockedException When the required order is locked.
     * @throws RestErrorException When an unexpected error occurs when
     *         requesting Amplia.
     * @throws RestUnreachableException When the client doesn't reach the Amplia
     *         endpoint.
     */
    public function getOrderIssueLink($orderId, $returnUrl = null)
    {
        if (!isset($orderId)) {
            throw new \InvalidArgumentException('The provided "orderId" cannot have a null value.');
        }
        $client = $this->_getRestClient();

        $url = "api/orders/{$orderId}/issue-link";
        if (isset($returnUrl)) {
            $encodedUrl = urlencode($returnUrl);
            $url .= "?returnUrl={$encodedUrl}";
        }

        $response = $client->get($url);
        return $response->getBody();
    }

    /**
     * Deletes an order on Amplia.
     *
     * @param $orderId string The order's id, which is used to identify the
     *        order on Amplia.
     * @throws AmpliaException When a error has occurs on Amplia.
     * @throws OrderLockedException When the required order is locked.
     * @throws RestErrorException When an unexpected error occurs when
     *         requesting Amplia.
     * @throws RestUnreachableException When the client doesn't reach the Amplia
     *         endpoint.
     */
    public function deleteOrder($orderId)
    {
        if (!isset($orderId)) {
            throw new \InvalidArgumentException('The provided "orderId" cannot have a null value.');
        }
        $client = $this->_getRestClient();

        $client->delete("api/orders/{$orderId}");
    }

    /**
     * Issues an certificate.
     *
     * @param $orderId string The order's id, which is used to identify the
     *        order on Amplia.
     * @param $csr string certificate signing request.
     * @return Certificate The certificate object.
     * @throws AmpliaException When a error has occurs on Amplia.
     * @throws OrderLockedException When the required order is locked.
     * @throws RestErrorException When an unexpected error occurs when
     *         requesting Amplia.
     * @throws RestUnreachableException When the client doesn't reach the Amplia
     *         endpoint.
     */
    public function issueCertificate($orderId, $csr)
    {
        $client = $this->_getRestClient();
        $request = new IssueCertificateRequest($orderId, $csr);

        $response = $client->post('api/v2/certificates', $request->toModel());
        return new Certificate($response->body);
    }

    /**
     * Lists the certificates
     *
     * @param null $searchParams Parameters that will be used to filter the list returned.
     * @param false $validOnly Filter only valid certificates.
     * @return PaginatedSearchResponse the result fo the search.
     * @throws AmpliaException When a error has occurs on Amplia.
     * @throws OrderLockedException When the required order is locked.
     * @throws RestErrorException When an unexpected error occurs when
     *         requesting Amplia.
     * @throws RestUnreachableException When the client doesn't reach the Amplia
     *         endpoint.
     */
    public function listCertificates($searchParams = null, $validOnly = false)
    {
        if (isset($searchParams) && !($searchParams instanceof PaginatedSearchParams)) {
            throw new \RuntimeException("The \"searchParams\" parameter is not a instance of the PaginatedSearchParams class.");
        }
        $client = $this->_getRestClient();
        $url = self::_setPaginatedSearchParams('api/v2/certificates', $searchParams ?: new PaginatedSearchParams()) . "&validOnly={$validOnly}";

        $response = $client->get($url);
        return new PaginatedSearchResponse($response->body, function ($i) {
            return new CertificateSummary($i);
        });
    }

    /**
     * Retrieves the certificate's info.
     *
     * @param $certificateId string The certificates's ID.
     * @param false $fillContent The option to fill the certificate's content in the object.
     * @return Certificate The certificate object.
     * @throws AmpliaException When a error has occurs on Amplia.
     * @throws OrderLockedException When the required order is locked.
     * @throws RestErrorException When an unexpected error occurs when
     *         requesting Amplia.
     * @throws RestUnreachableException When the client doesn't reach the Amplia
     *         endpoint.
     */
    public function getCertificate($certificateId, $fillContent = false)
    {
        if (empty($certificateId)) {
            throw new \RuntimeException("The certificateId was not provided");
        }
        $client = $this->_getRestClient();

        $response = $client->get("api/v2/certificates/{$certificateId}?fillContent={$fillContent}");
        return new Certificate($response->body);
    }

    /**
     * Revokes a certificate.
     *
     * @param $certificateId string The certificates's ID.
     *
     * @throws AmpliaException When a error has occurs on Amplia.
     * @throws OrderLockedException When the required order is locked.
     * @throws RestErrorException When an unexpected error occurs when
     *         requesting Amplia.
     * @throws RestUnreachableException When the client doesn't reach the Amplia
     *         endpoint.
     */
    public function revokeCertificate($certificateId)
    {
        if (empty($certificateId)) {
            throw new \RuntimeException("The certificateId was not provided");
        }
        $client = $this->_getRestClient();

        $client->delete("api/certificates/{$certificateId}");
    }

    /**
     * @private
     *
     * Gets an client to perform the HTTP requests.
     *
     * @param $customRequestHeaders array
     * @return RestClient The REST client used to perform the HTTP requests.
     */
    private function _getRestClient($customRequestHeaders = [])
    {
        if (!isset($this->_restClient)) {
            $this->_restClient = new RestClient(
                $this->_endpointUri,
                $this->_apiKey,
                $customRequestHeaders,
                $this->_usePhpCAInfo,
                $this->_caInfoPath
            );
        }
        return $this->_restClient;
    }

    /**
     * @private
     *
     * Builds the URL that will be called in a search request.
     *
     * @param $originalUri string The original URI.
     * @param $searchParams PaginatedSearchParams The search parameters.
     * @return string The resulting URL.
     */
    private static function _setPaginatedSearchParams($originalUri, $searchParams)
    {
        return "{$originalUri}?" .
            "q=" . urlencode($searchParams->q) . "&" .
            "limit={$searchParams->limit}&" .
            "offset={$searchParams->offset}&" .
            "order={$searchParams->order}";
    }

    /**
     * @private
     *
     * Gets the URL route, which is related to the certificate format provided
     * by the CertificateParameters, that will be used to request Amplia's API.
     *
     * @param $format string The certificate format related to a URL route on
     *        Amplia.
     * @return string The URL route related to be used to call Amplia's API.
     */
    private static function _getTypedRouteSegment($format)
    {
        if (isset(self::$TYPED_API_ROUTES[$format])) {
            return self::$TYPED_API_ROUTES[$format];
        }
        throw new \InvalidArgumentException("Certificate format not supported: {$format}");
    }

    /**
     * Gets the Amplia's endpoint URI to be accessed by this client to perform
     * the requests.
     *
     * @return string The Amplia's endpoint URI.
     */
    public function getEndpointUri()
    {
        return $this->_endpointUri;
    }

    /**
     * Sets the Amplia's endpoint URI to be accessed by this client to perform
     * the requests.
     *
     * @param string $endpointUri The Amplia's endpoint URI.
     */
    public function setEndpointUri($endpointUri)
    {
        $this->_endpointUri = $endpointUri;
    }

    /**
     * Gets the Amplia's API key to be used on every request to Amplia.
     *
     * @return string The Amplia's API key to be used on Amplia.
     */
    public function getApiKey()
    {
        return $this->_apiKey;
    }

    /**
     * Sets the Amplia's API key to be used on every request to Amplia.
     *
     * @param string $apiKey The Amplia's API key to be used on Amplia.
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Gets the option to choose the PHP configuration "curl.cainfo" in order to
     * inform the trusted CA list.
     *
     * @return bool The option to choose the PHP configuration "curl.cainfo" in
     * order to inform the trusted CA list.
     */
    public function getUsePhpCAInfo()
    {
        return $this->_usePhpCAInfo;
    }

    /**
     * Sets the option to choose the PHP configuration "curl.cainfo" in order to
     * inform the trusted CA list.
     *
     * @param bool $usePhpCAInfo The option to choose the PHP configuration
     * "curl.cainfo" in order to inform the trusted CA list.
     */
    public function setUsePhpCAInfo($usePhpCAInfo)
    {
        $this->_usePhpCAInfo = $usePhpCAInfo;
    }

    /**
     * Gets the path of the CA certificate list.
     *
     * @return string The CA certificate list's path.
     */
    public function getCAInfoPath()
    {
        return $this->_caInfoPath;
    }

    /**
     * Sets the path of the CA certificate list.
     *
     * @param string $caInfoPath The CA certificate list's path.
     */
    public function setCAInfoPath($caInfoPath)
    {
        $this->_caInfoPath = $caInfoPath;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'endpointUri':
                return $this->getEndpointUri();
            case 'apiKey':
                return $this->getApiKey();
            case 'usePhpCAInfo':
                return $this->getUsePhpCAInfo();
            case 'caInfoPath':
                return $this->getCAInfoPath();
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return null;
        }
    }

    public function __isset($prop)
    {
        switch ($prop) {
            case 'endpointUri':
                return isset($this->_endpointUri);
            case 'apiKey':
                return isset($this->_apiKey);
            case 'usePhpCAInfo':
                return isset($this->_usePhpCAInfo);
            case 'caInfoPath':
                return isset($this->_caInfoPath);
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return false;
        }
    }

    public function __set($prop, $value)
    {
        switch ($prop) {
            case 'endpointUri':
                $this->setEndpointUri($value);
                break;
            case 'apiKey':
                $this->setApiKey($value);
                break;
            case 'usePhpCAInfo':
                $this->setUsePhpCAInfo($value);
                break;
            case 'caInfoPath';
                $this->setCAInfoPath($value);
                break;
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
        }
    }
}