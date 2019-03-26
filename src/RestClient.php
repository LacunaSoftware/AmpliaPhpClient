<?php

namespace Lacuna\Amplia;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\TransferException;
use Psr\Http\Message\ResponseInterface;

class RestClient
{
    private $_endpointUri;
    private $_apiKey;
    private $_customRequestHeaders;

    public function __construct($endpointUri, $apiKey, $customRequestHeaders = [])
    {
        $this->_endpointUri = $endpointUri;
        $this->_apiKey = $apiKey;
        $this->_customRequestHeaders = $customRequestHeaders;
    }

    /**
     * @param $url
     * @return HttpResponse
     * @throws AmpliaException
     * @throws OrderLockedException
     * @throws RestErrorException
     * @throws RestUnreachableException
     */
    public function get($url)
    {
        $verb = 'GET';
        $client = $this->_getClient();
        $httpResponse = null;
        try {
            $httpResponse = $client->get($url);
        } catch (TransferException $ex) {
            throw new RestUnreachableException($verb, $url, $ex);
        }
        $this->_checkResponse($verb, $url, $httpResponse);
        return HttpResponse::getInstance($httpResponse);
    }

    /**
     * @param $url
     * @param $data
     * @return HttpResponse
     * @throws AmpliaException
     * @throws OrderLockedException
     * @throws RestErrorException
     * @throws RestUnreachableException
     */
    public function post($url, $data)
    {
        $verb = 'POST';
        $client = $this->_getClient();
        $httpResponse = null;
        try {
            if (empty($data)) {
                $httpResponse = $client->post($url);
            } else {
                $httpResponse = $client->post($url, array('json' => $data));
            }
        } catch (TransferException $ex) {
            throw new RestUnreachableException($verb, $url, $ex);
        }
        $this->_checkResponse($verb, $url, $httpResponse);
        return HttpResponse::getInstance($httpResponse);
    }

    /**
     * @param $url
     * @return HttpResponse
     * @throws AmpliaException
     * @throws OrderLockedException
     * @throws RestErrorException
     * @throws RestUnreachableException
     *
     */
    public function delete($url)
    {
        $verb = 'DELETE';
        $client = $this->_getClient();
        $httpResponse = null;
        try {
            $httpResponse = $client->delete($url);
        } catch (TransferException $ex) {
            throw new RestUnreachableException($verb, $url, $ex);
        }
        $this->_checkResponse($verb, $url, $httpResponse);
        return HttpResponse::getInstance($httpResponse);
    }

    private function _getClient()
    {
        $headers = [
            'Accept' => 'application/json'
        ];
        if (!empty($this->apiKey)) {
            $headers['X-Api-Key'] = $this->apiKey;
        }
        foreach ($this->_customRequestHeaders as $key => $value) {
            $headers[$key] = $value;
        }
        return new Client([
            'base_uri'    => $this->_endpointUri,
            'headers'     => $headers,
            'http_errors' => false
        ]);
    }

    /**
     * @param $verb string
     * @param $url string
     * @param $httpResponse ResponseInterface
     * @throws OrderLockedException
     * @throws AmpliaException
     * @throws RestErrorException
     */
    private function _checkResponse($verb, $url, $httpResponse)
    {
        $statusCode = $httpResponse->getStatusCode();
        if ($statusCode < 200 || $statusCode > 299) {
            $ex = null;
            try {
                $response = json_decode($httpResponse->getBody());
                if ($statusCode == 422 && isset($response->code)) {
                    if ($response->code == "OrderLocked") {
                        $ex = new OrderLockedException($verb, $url, $response->message);
                    } else {
                        $ex = new AmpliaException($verb, $url, $response);
                    }
                } else {
                    $ex = new RestErrorException($verb, $url, $statusCode, $response->message);
                }
            } catch (\Exception $e) {
                $ex = new RestErrorException($verb, $url, $statusCode);
            }
            throw $ex;
        }
    }

    /**
     * @return mixed
     */
    public function getEndpointUri()
    {
        return $this->_endpointUri;
    }

    /**
     * @param mixed $endpointUri
     */
    public function setEndpointUri($endpointUri)
    {
        $this->_endpointUri = $endpointUri;
    }

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->_apiKey;
    }

    /**
     * @param mixed $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->_apiKey = $apiKey;
    }

    /**
     * @return mixed
     */
    public function getCustomRequestHeaders()
    {
        return $this->_customRequestHeaders;
    }

    /**
     * @param mixed $customRequestHeaders
     */
    public function setCustomRequestHeaders($customRequestHeaders)
    {
        $this->_customRequestHeaders = $customRequestHeaders;
    }

    public function addCustomRequestHeaders($key, $value)
    {
        $this->_customRequestHeaders[$key] = $value;
    }

    public function removeCustomRequestHeaders($key)
    {
        if (isset($this->_customRequestHeaders[$key])) {
            unset($this->_customRequestHeaders[$key]);
        }
    }

    public function __get($prop)
    {
        switch ($prop) {
            case 'endpointUri':
                return $this->getEndpointUri();
            case 'apiKey':
                return $this->getApiKey();
            case 'customRequestHeaders':
                return $this->getCustomRequestHeaders();
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
            case 'customRequestHeaders':
                return isset($this->_customRequestHeaders);
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
            case 'customRequestHeaders':
                $this->setCustomRequestHeaders($value);
                break;
            default:
                trigger_error('Undefined property: ' . __CLASS__ . '::$' . $prop);
        }
    }
}