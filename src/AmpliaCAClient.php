<?php

namespace Lacuna\Amplia;

/**
 * Class AmpliaCAClient
 * @package Lacuna\Amplia
 *
 * The class responsible for .
 *
 */
class AmpliaCAClient extends AmpliaClient
{
    public function __construct(
        $endpointUri,
        $apiKey,
        $usePhpCAInfo = false,
        $caInfoPath = null
    ) {
        parent::__construct($endpointUri, $apiKey, $usePhpCAInfo, $caInfoPath);
    }

    /**
     *
     * @param $request CreateKeyRequest 
     * @return KeyModel The created key.
     * 
     */
    public function CreateKey($request) {
        $client = $this->_getRestClient();
        $response = $client->post("api/keys/", $request);
        return new KeyModel($response->body);
    }

    /**
     *
     * @param $id string The UUID of the key to be deleted.
     * 
     */
    public function DeleteKey($id) {
        $client = $this->_getRestClient();
        $client->delete("api/keys/{$id}");
    }


    /**
     *
     * @param $request RegisterKeyRequest 
     * @return KeyModel The registered key.
     * 
     */
    public function RegisterKey($request, $subscriptionId) {
        $client = $this->_getRestClient(array('X-Subscription' => $subscriptionId));
        $response = $client->put("api/keys", $request);
        return new KeyModel($response->body);
    }

    /**
     *
     * @param $id string The UUID of the key you want to update the parameters.
     * @param $model KeyParametersModel 
     * @return KeyParametersModel The updated key parameters.
     * 
     */
    public function UpdateKeyParameters($id, $model) {
        $client = $this->_getRestClient();
        $response = $client->put("api/keys/{$id}/parameters", $model);
        return new KeyParametersModel($response->body);
    }

    /**
     *
     * @param $request CreateCARequest
     * @return CAModel The model of the created CA.
     * 
     */
    public function CreateCA($request) {
        $client = $this->_getRestClient();
        $response = $client->post("api/cas", $request);
        return new CAModel($response->body);
    }

    /**
     *
     * @param $caId string The UUID of the wanted CA.
     * @param $fillContent bool The flag that indicates 
     * if the CA content should be filled or not.
     * @return CAModel The model of the requested CA.
     * 
     */
    public function GetCA($caId, $fillContent = false) {
        $client = $this->_getRestClient();
        $response = $client->get("api/cas/{$caId}?fillContent={$fillContent}");
        return new CAModel($response->body);
    }

    /**
     *
     * @param $caId string The UUID of the CA you want to activate.
     * 
     */
    public function ActivateCA($caId) {
        $client = $this->_getRestClient();
        $request = array('IsActive' => true);
        $client->post("api/cas/{$caId}/activation-state", $request);
    }

    /**
     *
     * @param $caId string The UUID of the CA you want to deactivate.
     * 
     */
    public function DeactivateCA($caId) {
        $client = $this->_getRestClient();
        $request = array('IsActive' => false);
        $client->post("api/cas/{$caId}/activation-state", $request);
    }

    /**
     *
     * @param $request IssueRootCARequest 
     * @return CAModel The model of the issued root CA.
     * 
     */
    public function IssueRootCA($request, $subscriptionId) {
        $client = $this->_getRestClient(array('X-Subscription' => $subscriptionId));
        $response = $client->post("api/root-cas");
        return new CAModel($response->body, $request);
    }

    /**
     *
     * Verify if the CA name is still available or already in use.
     * 
     * @param $name string
     * @return bool Whether the CA name is available.
     * 
     */
    public function IsCANameAvailable($name) {
        $client = $this->_getRestClient();
        $response = $client->get("api/cas/name-availability?name={$name}");
        return boolval($response->body);
    }

}