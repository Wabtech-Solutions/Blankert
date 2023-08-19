<?php
/***************************************************
 * Hubspot Company
 * Version 0.1
 * 16-02-2022
 ***************************************************/
namespace App\Library\Hubspot\Object;

use App\Library\Hubspot\Object\ObjectAbstract;

use HubSpot\Client\Crm\Companies\ApiException;
use HubSpot\Client\Crm\Companies\Model\SimplePublicObjectInput;
use HubSpot\Client\Crm\Companies\Model\PublicObjectSearchRequest;

class Company extends ObjectAbstract
{
    /***************************************************
     * Get company by id
     */
    public function getCompanyById($companyId, array $properties = []) {
        try {
            $this->response = $this->hubspot->crm()->companies()->basicApi()->getById($companyId, $properties);
            $this->result = $this->response;
            $this->id = $this->response->getId();
        } 
        catch (ApiException $e) {

            dd($e);

            $this->errorResponse( $e->getResponseBody() );
        }
    }

    /***************************************************
     * Create company
     */
    public function createCompany($properties) {
        $SimplePublicObjectInput = new SimplePublicObjectInput(['properties' => $properties]);

        try {
            $this->response = $this->hubspot->crm()->companies()->basicApi()->create($SimplePublicObjectInput);
            $this->id = $this->response->getId();
        } 
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }

    /***************************************************
     * Update company
     */
    public function updateCompany($companyId, $properties) {
        $SimplePublicObjectInput = new SimplePublicObjectInput(['properties' => $properties]);

        try {
            $this->response = $this->hubspot->crm()->companies()->basicApi()->update($companyId, $SimplePublicObjectInput, null);
        }
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }

    /***************************************************
     * Get associated deals
     */
    public function getAssociatedDeals(array $options = []) {
        // Company ID
        if(isset($options['companyId'])) {
            $this->id = $options['companyId'];
        }

        try {
            $this->response = $this->hubspot->crm()->companies()->associationsApi()->getAll($this->id, 'deals', null, 500);
            $this->results = $this->response->getResults();

            return $this->results;
        } 
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }

    /***************************************************
     * Associate Company
     */
    public function associateCompany($childCompanyId, $parentCompanyId) {
        try {
            $this->response = $this->hubspot->crm()->companies()->associationsApi()->create($childCompanyId, 'companies', $parentCompanyId, 14);
        }
        catch (ApiException $e) {
            dump($e);
            $this->errorResponse( $e->getResponseBody() );
        }
    }

    /***************************************************
     * Search company by standard properties
     */
    public function searchCompany(array $settings) {
        // Search request
        $searchRequest = [
            'query' => $settings['query'], 
            'sorts' => ['domain'], 
            'limit' => 10, 
            'after' => 0
        ];

        // Select custom properties
        if(isset($settings['selectProperties'])) {
            $searchRequest['properties'] = (array) $settings['selectProperties'];
        }

        // Hubspot search request
        $publicObjectSearchRequest = new PublicObjectSearchRequest($searchRequest);

        try {
            $this->response = $this->hubspot->crm()->companies()->searchApi()->doSearch($publicObjectSearchRequest);
            $this->results = $this->response->getResults();

            $this->ifExists();
        }
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }

    /***************************************************
     * Search company by property
     */
    public function searchCompanyByProperty(array $settings) {
        // Search request
        $searchRequest = [
            'filter_groups' => [
                [
                    'filters' => [
                        [
                            'value' => $settings['query'],
                            'propertyName' => $settings['property'],
                            'operator' => 'EQ',
                        ],         
                    ],
                ],
            ],
            'limit' => 10, 
            'after' => 0
        ];

        // Select custom properties
        if(isset($settings['selectProperties'])) {
            $searchRequest['properties'] = (array) $settings['selectProperties'];
        }

        // Hubspot search request
        $publicObjectSearchRequest = new PublicObjectSearchRequest($searchRequest);

        try {
            $this->response = $this->hubspot->crm()->companies()->searchApi()->doSearch($publicObjectSearchRequest);
            $this->results = $this->response->getResults();
            $this->ifExists();
        }
        catch (ApiException $e) {
            $this->errorResponse( $e->getResponseBody() );
        }
    }    

    /***************************************************
     * If company exists
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