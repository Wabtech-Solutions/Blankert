<?php
/***************************************************
 * Hubspot Deal
 * Version 0.1
 * 16-02-2022
 ***************************************************/
namespace App\Library\Hubspot\Object;

use App\Library\Hubspot\Object\ObjectAbstract;

use HubSpot\Client\Crm\Deals\ApiException;
use HubSpot\Client\Crm\Deals\Model\SimplePublicObjectInput;
use HubSpot\Client\Crm\Deals\Model\PublicObjectSearchRequest;

class Deal extends ObjectAbstract
{
    /***************************************************
     * Create deal
     */
    public function createDeal($properties) {
        $SimplePublicObjectInput = new SimplePublicObjectInput(['properties' => $properties]);

        try {
            $this->response = $this->hubspot->crm()->deals()->basicApi()->create($SimplePublicObjectInput);
            $this->id = $this->response->getId();
        }
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }

    /***************************************************
     * Update deal
     */
    public function updateDeal($dealId, $properties) {
        $SimplePublicObjectInput = new SimplePublicObjectInput(['properties' => $properties]);

        try {
            $this->response = $this->hubspot->crm()->deals()->basicApi()->update($dealId, $SimplePublicObjectInput);
            $this->id = $this->response->getId();
        }
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }

    /***************************************************
     * Get deal by ID
     */
    public function getDealById($dealId, array $properties = []) {
        $propertiesList = implode(',', $properties['properties']);
        $endpoint = 'https://api.hubapi.com/crm/v3/objects/deals/' . $dealId . '?&associations=contacts,company&archived=false&properties=' . $propertiesList;
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

        $this->result = json_decode(curl_exec($ch));

        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);
    }

    /***************************************************
     * Search company by property
     */
    public function searchDealByProperty(array $settings) {

        $filterSettings = [];

        foreach($settings as $setting) {

            $filterSettings[] = [
                'value' => $setting['query'],
                'propertyName' => $setting['property'],
                'operator' => 'EQ',
            ];
        }
        // Search request
        $searchRequest = [
            'filter_groups' => [
                [
                    'filters' => $filterSettings,
                ],
            ],
            'limit' => 10,
            'after' => 0,
        ];

        // Select custom properties
        if(isset($settings['selectProperties'])) {
            $searchRequest['properties'] = (array) $settings['selectProperties'];
        }

        // Hubspot search request
        $publicObjectSearchRequest = new PublicObjectSearchRequest($searchRequest);


        try {
            $this->response = $this->hubspot->crm()->deals()->searchApi()->doSearch($publicObjectSearchRequest);
            $this->results = $this->response->getResults();
            return $this->results;
        }
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }


    /***************************************************
     * Associate deal to contact
     */
    public function associateDealToContact($options) {
        if(isset($options['dealId'])) {
            $this->id = $options['dealId'];
        }

        try {
            $this->response = $this->hubspot->crm()->deals()->associationsApi()->create($this->id, 'contact', $options['contactId'], 3);
        }
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }

    /***************************************************
     * Associate deal to company
     */
    public function associateDealToCompany($options) {
        if(isset($options['dealId'])) {
            $this->id = $options['dealId'];
        }

        try {
            $this->response = $this->hubspot->crm()->deals()->associationsApi()->create($this->id, 'company', $options['companyId'], 5);
        }
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }

    /***************************************************
     * Associate deal to company
     */
    public function getAssociationsOfDeal($options) {
        if(isset($options['dealId'])) {
            $this->id = $options['dealId'];
        }

        try {
            $this->response = $this->hubspot->crm()->deals()->associationsApi()->getAll($this->id, 3, null, 500);

            dd($this->response);
        }
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }

    /***************************************************
     * If exists
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
