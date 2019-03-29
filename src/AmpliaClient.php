<?php

namespace Lacuna\Amplia;


class AmpliaClient
{
    private $TYPED_API_ROUTES = [
        'PkiBrazil' => 'pki-brazil',
        'Ssl' => 'ssl',
        'Cnb' => 'cnb',
        'Cie' => 'cie',
        'Arisp' => 'arisp'
    ];

    private $_endpointUri;
    private $_apiKey;
    private $_restClient;

    public function __construct($endpointUri, $apiKey)
    {
        $this->_endpointUri = $endpointUri;
        $this->_apiKey = $apiKey;
    }

    /**
     * @param $request
     * @return Order
     * @throws AmpliaException
     * @throws OrderLockedException
     * @throws RestErrorException
     * @throws RestUnreachableException
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

        $response = $client->post("api/orders/{$typeRouteSegment}", $request);
        return new Order($response->body);
    }

    /**
     * @param $orderId
     * @return Order
     * @throws AmpliaException
     * @throws OrderLockedException
     * @throws RestErrorException
     * @throws RestUnreachableException
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
     * @param $orderId
     * @param null $returnUrl
     * @return mixed
     * @throws AmpliaException
     * @throws OrderLockedException
     * @throws RestErrorException
     * @throws RestUnreachableException
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
     * @param $orderId
     * @throws AmpliaException
     * @throws OrderLockedException
     * @throws RestErrorException
     * @throws RestUnreachableException
     */
    public function deleteOrder($orderId)
    {
        if (!isset($orderId)) {
            throw new \InvalidArgumentException('The provided "orderId" cannot have a null value.');
        }
        $client = $this->_getRestClient();

        $client->delete("api/orders/{$orderId}");
    }

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

    private function _getTypedRouteSegment($format)
    {
        if (isset($this->TYPED_API_ROUTES[$format])) {
            return $this->TYPED_API_ROUTES[$format];
        }
        throw new \InvalidArgumentException("Certificate format not supported: {$format}");
    }
}