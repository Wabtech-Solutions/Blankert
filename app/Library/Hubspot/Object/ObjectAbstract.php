<?php
/***************************************************
 * Hubspot Contact
 * Version 0.1
 * 16-02-2022
 ***************************************************/
namespace App\Library\Hubspot\Object;

use HubSpot\Discovery\Discovery as Hubspot;
use HubSpot\Client\Crm\Contacts\ApiException;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput;
use HubSpot\Client\Crm\Contacts\Model\PublicObjectSearchRequest;
use Log;

class ObjectAbstract
{
    /******************
     * Bearer Token
     */
    protected $bearerToken;

    /******************
     * Hubspot
     */
    protected $hubspot;

    /******************
     * Error
     */
    protected $error;

    /******************
     * Respsonse
     */
    protected $response;

    /******************
     * Results
     */
    protected $results = [];

    /******************
     * Result
     */
    protected $result;

    /******************
     * Id
     */
    protected $id;

    /***************************************************
     * Constructor
     */
    public function __construct($bearerToken, Hubspot $Hubspot) {
        $this->bearerToken = (string) $bearerToken; 
        $this->hubspot = $Hubspot;
    }

    /***************************************************
     * Error response
     */
    protected function errorResponse($error) {
        $this->error = json_decode($error);
        Log::error($error);
        dump($error);
    }

    /***************************************************
     * Get Id
     */
    public function getId() {
        return $this->id;
    }

    /***************************************************
     * Get result
     */
    public function getResult() {
        return $this->result;
    }

    /***************************************************
     * Get results
     */
    public function getResults() {
        return $this->results;
    }

    /***************************************************
     * Reset
     */    
    public function reset() {
        $this->response = null;
        $this->id = null;
        $this->result = null;
    }
}
