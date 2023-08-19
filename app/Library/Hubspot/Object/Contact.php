<?php
/***************************************************
 * Hubspot Contact
 * Version 0.1
 * 16-02-2022
 ***************************************************/
namespace App\Library\Hubspot\Object;

use App\Library\Hubspot\Object\ObjectAbstract;

use HubSpot\Client\Crm\Contacts\ApiException;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput;
use HubSpot\Client\Crm\Contacts\Model\PublicObjectSearchRequest;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectId;
use HubSpot\Client\Crm\Contacts\Model\BatchReadInputSimplePublicObjectId;

use HubSpot\Factory;


class Contact extends ObjectAbstract
{
    /***************************************************
     * Create contact
     */
    public function createContact($properties) {
        $SimplePublicObjectInput = new SimplePublicObjectInput(['properties' => $properties]);

        try {
            $this->response = $this->hubspot->crm()->contacts()->basicApi()->create($SimplePublicObjectInput);
            $this->id = $this->response->getId();
            $this->result = $this->response;
        } 
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }

    /***************************************************
     * Update contact
     */
    public function updateContact($contactId, $properties) {
        $SimplePublicObjectInput = new SimplePublicObjectInput(['properties' => $properties]);

        try {
            $this->response = $this->hubspot->crm()->contacts()->basicApi()->update($contactId, $SimplePublicObjectInput, null);
        }
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }

    /***************************************************
     * Search contact
     */
    public function searchContactByEmail(array $options) {
        $properties = ['email'];
        if(isset($options['properties'])) {
            $properties = array_merge($properties, $options['properties']);
        }

        $publicObjectSearchRequest = new PublicObjectSearchRequest(['query' => $options['query'], 'sorts' => ['email'], 'properties' => $properties, 'limit' => 10, 'after' => 0]);

        try {
            $this->response = $this->hubspot->crm()->contacts()->searchApi()->doSearch($publicObjectSearchRequest);  
            $this->results = $this->response->getResults();
            $this->ifExists();
        }
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }

    /***************************************************
     * Get Contact By Id
     */
    public function getContactById($contactId, array $properties = []) 
    {
        // Prepare a comma seperated list
        $propertiesList = implode(',', $properties['properties']);

        // Endpoint
        $endpoint = 'https://api.hubapi.com/crm/v3/objects/contacts/' . $contactId . '?archived=false&associations=deals&properties=' . $propertiesList;
        
        // cURL call
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_TIMEOUT,15);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_NOSIGNAL, 1);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            "Authorization: Bearer " . $this->bearerToken
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Result
        $this->result = json_decode(curl_exec($ch));

        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);
    }

    /***************************************************
     * Get Contacts By Ids
     */
    public function getContactByIds(array $contactIds, array $properties = []) 
    {
        try {
            // Array for Ids
            $simplePublicObjectIds = [];

            foreach($contactIds as $id) {
                $simplePublicObjectIds[] = new SimplePublicObjectId([
                    'id' => $id
                ]);
            }
            
            $batchReadInputSimplePublicObjectId = new BatchReadInputSimplePublicObjectId([
                'properties' => (array) $properties,
                'inputs' => $simplePublicObjectIds,
            ]);

            // Response
            $this->response = $this->hubspot->crm()->contacts()->batchApi()->read($batchReadInputSimplePublicObjectId, false);
            $this->results = $this->response->getResults();

            return $this->results;
        }
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }


    /***************************************************
     * Associations company <-> contact ASSOCIATE
     */
    public function associateCompanyToContact($options) {
        if(!isset($options['companyId'])) {
            return false;
        }

        if(isset($options['contactId'])) {
            $this->id = (int) $options['contactId'];
        }

        try {
            $this->response = $this->hubspot->crm()->contacts()->associationsApi()->create($this->id, 'companies', $options['companyId'], 1);
        } 
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }

    /***************************************************
     * Get associated companies
     */
    public function getAssociatedCompanies(array $options = []) {
        try {
            $this->response = $this->hubspot->crm()->contacts()->associationsApi()->getAll($this->id, 'companies', null, 500);
            $this->results = $this->response->getResults();

            if(isset($options['getFirstCompanyId']) && $options['getFirstCompanyId'] == true) {
                foreach($this->results as $result) {
                    return $result->getId();
                }
                return false;
            }

            return $this->results;
        } 
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }

    /***************************************************
     * Get associated deals
     */
    public function getAssociatedDeals(array $options = []) {
        // Contact ID
        if(isset($options['contactId'])) {
            $this->id = $options['contactId'];
        }

        try {
            $this->response = $this->hubspot->crm()->contacts()->associationsApi()->getAll($this->id, 'deals', null, 500);
            $this->results = $this->response->getResults();

            if(isset($options['getFirstCompanyId']) && $options['getFirstCompanyId'] == true) {
                foreach($this->results as $result) {
                    return $result->getId();
                }
                return false;
            }

            return $this->results;
        } 
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }

    /***************************************************
     * Search contact
     */
    public function ifExists() {
        if(!isset($this->response) || count($this->results) == 0) {
            return false;
        }

        foreach($this->results as $result) {
            $this->id = $result->getId();
            $this->result = $result;
            break;
        }

        return $this->id;
    }
}
