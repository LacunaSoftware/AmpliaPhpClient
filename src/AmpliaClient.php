<?php

namespace Lacuna\Amplia;

/**
 * Class AmpliaClient
 * @package Lacuna\Amplia
 *
 * The class responsible for perform the requests to Lacuna Software's Amplia. Amplia is used to provide certificate
 * lifecycle to applications.
 *
 * @property-read $endpointUri string The Amplia's endpoint URI to be accessed by this client.
 * @property-read $apiKey string The Amplia's API KEY to be used on every request to Amplia.
 */
class AmpliaClient
{
    /**
     * @private
     * @const
     * @var array
     *
     * API routes list that relates the provided parameters' type with a URL route to Amplia.
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
     * AmpliaClient constructor.
     *
     * @param $endpointUri string The Amplia's endpoint URI to be accessed by this client.
     * @param $apiKey string The Amplia's API KEY to be used on every request to Amplia.
     */
    public function __construct($endpointUri, $apiKey)
    {
        $this->_endpointUri = $endpointUri;
        $this->_apiKey = $apiKey;
    }

    /**
     * Creates an order to issue a certificate on Amplia.
     *
     * @param $request CreateOrderRequest The request used to create an order.
     * @return Order The created order.
     * @throws AmpliaException When a error has occurs on Amplia.
     * @throws OrderLockedException When the required order is locked.
     * @throws RestErrorException When an unexpected error occurs when requesting Amplia.
     * @throws RestUnreachableException When the client doesn't reach the Amplia endpoint.
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

        $response = $client->post("api/orders/{$typeRouteSegment}", $request->toModel());
        return new Order($response->body);
    }

    /**
     * Retrieves an order from Amplia.
     *
     * @param $orderId string The order's id, which is used to identify the order on Amplia.
     * @return Order The retrieved order.
     * @throws AmpliaException When a error has occurs on Amplia.
     * @throws OrderLockedException When the required order is locked.
     * @throws RestErrorException When an unexpected error occurs when requesting Amplia.
     * @throws RestUnreachableException When the client doesn't reach the Amplia endpoint.
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
     * Retrieves an issuing link for an order to redirect the user to a application that will perform the
     * issuing the certificate directly on the user's machine. It's possible to pass the return URL, that Amplia will
     * return after issuing the certificate.
     *
     * @param $orderId string The order's id, which is used to identify the order on Amplia.
     * @param string|null $returnUrl The return URL, which is used to redirect the user after issuing the certificate.
     * @return string The issuing link to redirect the user to issue its certificate.
     * @throws AmpliaException When a error has occurs on Amplia.
     * @throws OrderLockedException When the required order is locked.
     * @throws RestErrorException When an unexpected error occurs when requesting Amplia.
     * @throws RestUnreachableException When the client doesn't reach the Amplia endpoint.
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
     * @param $orderId string The order's id, which is used to identify the order on Amplia.
     * @throws AmpliaException When a error has occurs on Amplia.
     * @throws OrderLockedException When the required order is locked.
     * @throws RestErrorException When an unexpected error occurs when requesting Amplia.
     * @throws RestUnreachableException When the client doesn't reach the Amplia endpoint.
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
     * @private
     *
     * Gets an client to perform the HTTP requests.
     *
     * @return RestClient The REST client used to perform the HTTP requests.
     */
    private function _getRestClient()
    {
        if (!isset($this->_restClient)) {
            $this->_restClient = new RestClient(
                $this->_endpointUri,
                $this->_apiKey
            );
        }
        return $this->_restClient;
    }

    /**
     * @private
     *
     * Gets the URL route, which is related to the certificate format provided by the CertificateParameters, that will
     * be used to request Amplia's API.
     *
     * @param $format string The certificate format related to a URL route on Amplia.
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
     * Gets the Amplia's endpoint URI to be accessed by this client to perform the requests.
     *
     * @return string The Amplia's endpoint URI.
     */
    public function getEndpointUri()
    {
        return $this->endpointUri;
    }

    /**
     * Gets the Amplia's API KEY to be used on every request to Amplia.
     *
     * @return string The Amplia's API KEY to be used on Amplia.
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'endpointUri':
                return $this->getEndpointUri();
            case 'apiKey':
                return $this->getApiKey();
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
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
                return false;
        }
    }
}