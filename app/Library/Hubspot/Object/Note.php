<?php
/***************************************************
 * Hubspot Note
 * - Uses legacy API due beta limitation V3
 * Version 0.1
 * 16-02-2022
 ***************************************************/
namespace App\Library\Hubspot\Object;

use App\Library\Hubspot\Object\ObjectAbstract;

use HubSpot\Client\Crm\Deals\ApiException; 
use HubSpot\Client\Crm\Deals\Model\SimplePublicObjectInput;

class Note
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
     * Create note
     * Uses the old api due limititions
     */
    public function createNoteAtDeal($properties) {
        $data = [
            'engagement' => [
                'active' => true,
               // 'ownerId' => 1,
                'type' => 'NOTE',
            ],
            'associations' => [
                'contactIds' => [],
                'companyIds' => [],
                'dealIds' => [$properties['dealId']],
                'ownerIds' => [],
                'ticketIds' => [],
            ],
            'attachments' => [
                [
                    'id' => $properties['fileId']
                ]
            ],
            'metadata' => [
                'body' => $properties['description'],
            ]
        ];

        $post_json = json_encode($data);
        $endpoint = 'https://api.hubapi.com/engagements/v1/engagements';
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


    /***************************************************
     * Test
     */
    public function test($properties) {
        $data = [

        ];

        $post_json = json_encode($data);
        $endpoint = 'https://api.hubapi.com/contactslistseg/v1/lists/all/contacts/all';
        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_GET, true);
        curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
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
        
        echo '<pre>'; 
            print_r(json_decode($response));

        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);

        dump($curl_errors);

        curl_close($ch);
        exit;
    }

}
