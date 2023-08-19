<?php
/***************************************************
 * Hubspot Form
 * - Uses legacy API due beta limitation V3
 * Version 0.1
 * 05-04-2022
 ***************************************************/
namespace App\Library\Hubspot\Object;

use App\Library\Hubspot\Object\ObjectAbstract;

use HubSpot\Client\Crm\Deals\ApiException; 
use HubSpot\Client\Crm\Deals\Model\SimplePublicObjectInput;

class Form
{
    /******************
     * Bearer Token
     */
    protected $bearerToken;

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
     * Id
     */
    protected $id;

    /***************************************************
     * Constructor
     */
    public function __construct($bearerToken) {
        $this->bearerToken = (string) $bearerToken;
    }

    /***************************************************
     * Creat form data
     */
    public function createFormdata($properties) {
        // Data
        $data = [
            'fields' => $properties['fields'],
            'context' => [
                'pageUri' => $properties['pageUri'],
                'pageName' => $properties['pageName'],
            ]
        ];

        // Hutspot cookie
        if(isset($properties['hutk'])) {
            $data['context']['hutk'] = $properties['hutk'];
        }

        // Legal consent options
        if(isset($properties['legalConsentOptions'])) {
            $data['legalConsentOptions'] = $properties['legalConsentOptions'];
        }


        $post_json = json_encode($data);
        $endpoint = 'https://api.hsforms.com/submissions/v3/integration/submit/' . $properties['portalId']. '/' . $properties['formGuid'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_json);
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_TIMEOUT,15);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
        
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            "Authorization: Bearer " . $this->bearerToken
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);

        curl_close($ch);
    }
}
