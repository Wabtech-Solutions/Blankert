<?php
/***************************************************
 * Hubspot
 * Version 0.2
 * 27-01-2022
 ***************************************************/
namespace App\Library;

use App\Library\Hubspot\Object\Contact;
use App\Library\Hubspot\Object\Company;
use App\Library\Hubspot\Object\Deal;
use App\Library\Hubspot\Object\File;
use App\Library\Hubspot\Object\Form;
use App\Library\Hubspot\Object\Note;
use App\Library\Hubspot\Helper\OAuth2;

class Hubspot
{
    /******************
     * Hubspot
     */
    protected $hubspot;

    /******************
     * Bearer token
     */
    protected $bearerToken;

    /******************
     * E-mail
     */
    protected $email;

    /******************
     * Website
     */
    protected $website;

    /******************
     * Company name
     */
    protected $companyname;

    /******************
     * Company settings
     */
    protected $companySettings;

    /******************
     * Company properties
     */
    protected $companyProperties;

    /******************
     * First name
     */
    protected $firstname;

    /******************
     * Last name
     */
    protected $lastname;

    /******************
     * Phone
     */
    protected $phone;

    /******************
     * Deal
     */
    protected $deal;

    /******************
     * Deal
     */
    protected $dealSettings;

    /******************
     * Deal properties
     */
    protected $dealProperties;

    /******************
     * Deal Id
     */
    protected $dealId;

    /******************
     * Note
     */
    protected $note;

    /******************
     * Note settings
     */
    protected $noteSettings;

    /******************
     * Form settings
     */
    protected $formSettings;

    /******************
     * File
     */
    protected $file;

    /******************
     * File Id
     */
    protected $fileId;

    /******************
     * File settings
     */
    protected $fileSettings;

    /******************
     * Contact Id
     */
    protected $contactId;

    /******************
     * Hubspot Contact
     */
    protected $contact;

    /******************
     * Contact settings
     */
    protected $contactSettings;

    /******************
     * Contact properties
     */
    protected $contactProperties;

    /******************
     * Hubspot Company
     */
    protected $company;

    /***************************************************
     * Constructor
     */
    public function __construct(array $options = [])
    {
        $this->bootstrap();
    }

    /***************************************************
     * Set access token
     */
    protected function bootstrap() {
        $this->login();
        $this->init();
    }

    /***************************************************
     * Init
     */
    protected function init() {
        if(!isset($this->hubspot)) {
            return false;
        }

        $this->contact = new Contact($this->bearerToken, $this->hubspot);
        $this->company = new Company($this->bearerToken, $this->hubspot);
        $this->deal = new Deal($this->bearerToken, $this->hubspot);
        $this->note = new Note($this->bearerToken);
        $this->form = new Form($this->bearerToken);
        $this->file = new File($this->bearerToken, $this->hubspot);
    }

    /***************************************************
     * Set deal properties
     */
    public function setDealProperties(array $properties) {
        $this->dealProperties = (array) $properties;
        return $this;
    }

    /***************************************************
     * Set deal id
     */
    public function setDealId(int $dealId) {
        $this->dealId = (int) $dealId;
        return $this;
    }

    /***************************************************
     * Set contact properties
     */
    public function setContactProperties(array $properties) {
        $this->contactProperties = (array) $properties;
        return $this;
    }

    /***************************************************
     * Set company properties
     */
    public function setCompanyProperties(array $properties) {
        $this->companyProperties = (array) $properties;
        return $this;
    }

    /***************************************************
     * Set email
     */
    public function setEmail(string $email) {
        $this->email = (string) trim(filter_var($email, FILTER_SANITIZE_EMAIL));

        if($this->website === null) {
            $website = explode('@', $this->email);
            $this->setWebsite( last($website) );
        }

        return $this;
    }

    /***************************************************
     * Set company name
     */
    public function setCompanyname(string $companyname) {
        $this->companyname = (string) htmlspecialchars($companyname);
        return $this;
    }

    /***************************************************
     * Set first name
     */
    public function setFirstname(string $firstname) {
        $this->firstname = (string) htmlspecialchars($firstname);
        return $this;
    }

    /***************************************************
     * Set last name
     */
    public function setLastname(string $lastname) {
        $this->lastname = (string) htmlspecialchars($lastname);
        return $this;
    }

    /***************************************************
     * Set last name
     */
    public function setPhone(string $phone) {
        $this->phone = (string) htmlspecialchars($phone);
        return $this;
    }

    /***************************************************
     * Set website
     */
    public function setWebsite(string $website) {
        $this->website = (string) htmlspecialchars($website);
        return $this;
    }

    /***************************************************
     * Set deal
     */
    public function setDeal(array $deal) {
        // Deal name
        if(isset($deal['name'])) {
            $this->dealSettings['name'] = (string) htmlspecialchars($deal['name']);
        }

        // Amount
        if(isset($deal['amount'])) {
            $this->dealSettings['amount'] = (float) filter_var($deal['amount'], FILTER_VALIDATE_FLOAT);
        }

        // Close date
        if(isset($deal['closedate'])) {
            $days = (int) filter_var($deal['closedate'], FILTER_VALIDATE_INT);
            $this->dealSettings['closedate'] = (string) date("Y-m-d\TH:i:s.000\Z", strtotime('+'. $days . ' days'));
        }

        // Stage
        if(isset($deal['stage'])) {
            $this->dealSettings['stage'] = (string) htmlspecialchars($deal['stage']);
        }

        // Pipeline
        if(isset($deal['pipeline'])) {
            $this->dealSettings['pipeline'] = (string) htmlspecialchars($deal['pipeline']);
        }

        // Custom properties
        if(isset($deal['properties'])) {
            foreach($deal['properties'] as $key => $value) {
                $fieldKey = (string) htmlspecialchars($key);
                $fieldValue = (string) htmlspecialchars($value);

                $this->dealSettings['properties'][$fieldKey] = (string) $fieldValue;
            }
        }

        return $this;
    }

    /***************************************************
     * Set company
     */
    public function setCompany(array $company) {
        // Company name
        if(isset($company['companyname'])) {
            $this->setCompanyname( $company['companyname'] );
        }

        // Website domain
        if(isset($company['website'])) {
            $this->setWebsite( $company['website'] );
        }

        // Custom properties
        if(isset($company['properties'])) {
            foreach($company['properties'] as $key => $value) {
                $fieldKey = (string) htmlspecialchars($key);
                $fieldValue = (string) htmlspecialchars($value);

                $this->companySettings['properties'][$fieldKey] = (string) $fieldValue;
            }
        }

        return $this;
    }


    /***************************************************
     * Set contact
     */
    public function setContact(array $contact) {
        // Reset contact
        $this->contact->reset();

        // E-mail
        if(isset($contact['email'])) {
            $this->setEmail( $contact['email'] );
        }

        // Company name
        if(isset($contact['companyname'])) {
            $this->setCompanyname( $contact['companyname'] );
        }

        // Website domain
        if(isset($contact['website'])) {
            $this->setWebsite( $contact['website'] );
        }

        // First name
        if(isset($contact['firstname'])) {
            $this->setFirstname( $contact['firstname'] );
        }

        // Last name
        if(isset($contact['lastname'])) {
            $this->setLastname( $contact['lastname'] );
        }

        // Phone number
        if(isset($contact['phone'])) {
            $this->setPhone( $contact['phone'] );
        }

        // Custom properties
        if(isset($contact['properties'])) {
            foreach($contact['properties'] as $key => $value) {
                $fieldKey = (string) htmlspecialchars($key);
                $fieldValue = (string) htmlspecialchars($value);

                $this->contactSettings['properties'][$fieldKey] = (string) $fieldValue;
            }
        }

        return $this;
    }

    /***************************************************
     * Set formdata
     */
    public function setFormdata(array $data) {
        // Portal Id
        if(isset($data['portalId'])) {
            $this->formSettings['portalId'] = (string) $data['portalId'];
        }
        else {
            $this->formSettings['portalId'] = (string) env('HUBSPOT_PORTAL_ID');
        }

        // Form GUID
        if(isset($data['formGuid'])) {
            $this->formSettings['formGuid'] = (string) $data['formGuid'];
        }

        // Page URI
        if(isset($data['pageUri'])) {
            $this->formSettings['pageUri'] = (string) $data['pageUri'];
        }

        // Pagename
        if(isset($data['pageName'])) {
            $this->formSettings['pageName'] = (string) $data['pageName'];
        }

        // Form fields
        if(isset($data['fields'])) {
            $this->formSettings['fields'] = (array) $data['fields'];
        }

         // Hubspotcookie
        if(isset($data['hutk'])) {
            $this->formSettings['hutk'] = (string) $data['hutk'];
        }

        return $this;
    }


    /***************************************************
     * Set note at deal
     */
    public function setNoteAtDeal(array $note) {
        if(isset($note['description'])) {
            $this->noteSettings['description'] = (string) $note['description'];
        }

        return $this;
    }

    /***************************************************
     * Set file
     */
    public function setFile($file) {
        if(isset($file['file'])) {
            $this->fileSettings['file'] = $file['file'];
        }
        if(isset($file['fileName'])) {
            $this->fileSettings['fileName'] = $file['fileName'];
        }

        if(isset($file['raw'])) {
            $this->fileSettings['raw'] = $file['raw'];
        }

        if(isset($file['path'])) {
            $this->fileSettings['path'] = (string) $file['path'];
        }

        return $this;
    }

    /***************************************************
     * Search contact
     */
    public function searchContactByEmail($options) {
        $this->contact->searchContactByEmail($options);

        return $this->contact->getResult();
    }

    /***************************************************
     * Search company by standard properties
     */
    public function searchCompany($settings) {
        $this->company->searchCompany($settings);

        return $this->company->getResult();
    }

    /***************************************************
     * Search company by property
     */
    public function searchCompanyByProperty($settings) {
        $this->company->searchCompanyByProperty($settings);

        return $this->company->getResult();
    }


    /***************************************************
     * Get complete deal
     */
    public function getCompleteDeal($dealId) {
        // Get deal info
        $deal = $this->getDealById($dealId, ['properties' => $this->dealProperties]);

        if(!isset($deal->id)) {
            return false;
        }

        $response['deal'] = json_decode(json_encode($deal->properties),true);
        $response['deal']['id'] = $deal->id;

        // Contact Ids
        $contactIds = [];
        $contactTypeById = [];

        // Company Id
        $companyId = null;

        // Associations
        if(isset($deal->associations)) {
            // Contacts
            if(isset($deal->associations->contacts)) {
                $contacts = $deal->associations->contacts;

                foreach($contacts->results as $result) {
                    if(!in_array($result->id, $contactIds)) {
                        $contactIds[] = (int) $result->id;
                    }

                    if($result->type != 'deal_to_contact') {
                        $contactTypeById[$result->id] = (string) $result->type;
                    }
                }
            }

            // Company
            if(isset($deal->associations->companies)) {
                foreach($deal->associations->companies->results as $result) {
                    if($result->type == 'deal_to_company') {
                        $companyId = $result->id;
                    }
                }
            }
        }

        // Contact Ids found
        if(count($contactIds) > 0) {
            $contacts = $this->getContactsByIds($contactIds, $this->contactProperties);

            foreach($contacts as $contact) {
                $response['contacts'][ $contact->getId() ] = $contact->getProperties();

                if(array_key_exists($contact->getId(), $contactTypeById)) {
                    $response['contacts'][ $contact->getId() ]['association_labels'][] = $contactTypeById[ $contact->getId() ];
                }
            }
        }

        // Company Id found
        if(isset($companyId)) {
            $company = $this->getCompanyById($companyId, ['properties' => $this->companyProperties]);

            if(isset($company)) {
                $response['company'] = $company->getProperties();
                $response['company']['id'] = $company->getId();
            }
        }

        return $response;
    }

    /***************************************************
     * Get contact by Id
     */
    public function getContactById($contactId, array $properties = []) {
        $this->contact->getContactById($contactId, $properties);

        return $this->contact->getResult();
    }

    /***************************************************
     * Get contacts by Ids
     */
    public function getContactsByIds(array $contactIds, array $properties = []) {
        $this->contact->getContactByIds($contactIds, $properties);

        return $this->contact->getResults();
    }


    /***************************************************
     * Search company by property
     */
    public function getCompanyById($companyId, array $properties = []) {
        $this->company->getCompanyById($companyId, $properties);

        return $this->company->getResult();
    }

    /***************************************************
     * Get deal by id
     */
    public function getDealById($dealId, array $properties = []) {
        $this->deal->getDealById($dealId, $properties);

        return $this->deal->getResult();
    }

    /***************************************************
     * Get deal by contact id
     */
    public function getDealsByContactId($contactId, array $properties = []) {
        $this->contact->getAssociatedDeals([
            'contactId' => $contactId,
        ]);

        return $this->contact->getResults();
    }

    /***************************************************
     * Get deal by contact id
     */
    public function getDealsByCompanyId($companyId, array $properties = []) {
        $this->company->getAssociatedDeals([
            'companyId' => $companyId,
        ]);

        return $this->company->getResults();
    }

    /***************************************************
     * Get companies by contact id
     */
    public function getCompaniesByContactId($contactId, array $properties = []) {
        $this->contact->getAssociatedCompanies([
            'contactId' => $contactId,
        ]);

        return $this->contact->getResults();
    }

    /***************************************************
     * Search deal
     */
    public function searchDealByProperty(array $settings) {
        return $this->deal->searchDealByProperty($settings);
    }

    /***************************************************
     * Deal Id
     */
    public function getDealId() {
        return $this->dealId;
    }

    /***************************************************
     * Contact exits
     */
    public function contactExists() {
        return $this->contact->getResult();
    }

    /***************************************************
     * Contact exits
     */
    public function getContactId() {
        return $this->contact->getId();
    }

    /***************************************************
     * Get contact
     */
    public function getContacts() {
        return $this->contact->getResults();
    }

    /***************************************************
     * Make deal
     */
    public function makeDeal($createCompany = true) {
        if(!isset($this->hubspot)) {
            return false;
        }

        // Create contact
        $this->createContact();

        // Create company
        if($createCompany == true) {
            $this->createCompany();
        }

        // Create deal
        $this->createDeal();

        // Link deal
        $this->associateDealToContact(['contactId' => $this->contactId]);

        // If there is a company linked
        if($createCompany == true && isset($this->companyId)) {
            $this->associateDealToCompany(['companyId' => $this->companyId]);
        }

        // Create file
        $this->createFile();
        $this->createNote();
        $this->createFormdata();
    }

    /***************************************************
     * Make file at deal
     */
    public function makeFileAtDeal() {
        if(!isset($this->hubspot)) {
            return false;
        }
        // Create file
        $this->createFile();
        $this->createNote();
        $this->createFormdata();
    }

    /***************************************************
     * Create contact
     */
    public function createContact() {
        // Search for contact
        $this->contact->searchContactByEmail(['query' => $this->email]);

        // If contact is not found
        if(!$this->contact->ifExists())
        {
            // Properties
            $properties = [
                'company' => (string) $this->companyname,
                'email' => (string) $this->email,
                'firstname' => (string) $this->firstname,
                'lastname' => (string) $this->lastname,
                'phone' => (string) $this->phone,
                'website' => (string) $this->website,
            ];

            // Properties
            if(isset($this->contactSettings['properties'])) {
                foreach($this->contactSettings['properties'] as $field => $value) {
                    $properties[$field] = $value;
                }
            }

            // Create contact
            $this->contact->createContact($properties);

            // Contact Id
            $this->contactId = $this->contact->getId();

            // Create company
            //$this->companyId = $this->createCompany();

            // Link company to contact
            //$this->contact->associateCompanyToContact($this->companyId);
        }
        else {
            $this->contactId = $this->contact->getId();

            // Get first company id
            //$this->companyId = $this->contact->getAssociatedCompanies(['getFirstCompanyId' => true]);
        }

        return $this->contactId;
    }

    /***************************************************
     * Update contact
     */
    public function updateContact($contactId) {
        // Properties
        $properties = [
            'company' => (string) $this->companyname,
            'email' => (string) $this->email,
            'firstname' => (string) $this->firstname,
            'lastname' => (string) $this->lastname,
            'phone' => (string) $this->phone,
            'website' => (string) $this->website,
        ];

        // Properties
        if(isset($this->contactSettings['properties'])) {
            foreach($this->contactSettings['properties'] as $field => $value) {
                $properties[$field] = $value;
            }
        }

        // Update contact
        $this->contact->updateContact($contactId, $properties);
    }

    /***************************************************
     * Create company
     */
    public function createCompany() {
        if(!isset($this->companyname)) {
            return false;
        }

        // Properties
        $properties = [
            'domain' => (string) $this->website,
            'name' => (string) $this->companyname,
        ];

        // Properties
        if(isset($this->companySettings['properties'])) {
            foreach($this->companySettings['properties'] as $field => $value) {
                $properties[$field] = $value;
            }
        }

        // Create company
        $this->company->createCompany($properties);

        // Company ID
        $this->companyId = $this->company->getId();

        return $this->companyId;
    }

    /***************************************************
     * Create company
     */
    public function updateCompany($companyId) {
        // Properties
        $properties = [
            'domain' => (string) $this->website,
            'name' => (string) $this->companyname,
        ];

        // Properties
        if(isset($this->companySettings['properties'])) {
            foreach($this->companySettings['properties'] as $field => $value) {
                $properties[$field] = $value;
            }
        }

        // Search company
        $this->company->updateCompany($companyId, $properties);
    }


    /***************************************************
     * Create deal
     */
    public function createDeal() {
        // Properties
        $properties = [
            'amount' => (float) $this->dealSettings['amount'],
            'dealname' => (string) $this->dealSettings['name'],
            'dealstage' => (string) $this->dealSettings['stage'],
            'pipeline' => (string) isset($this->dealSettings['pipeline']) ? $this->dealSettings['pipeline'] : 'default',
        ];

        // Closedate
        if(isset($this->dealSettings['closedate'])) {
            $properties['closedate'] = $this->dealSettings['closedate'];
        }

        // Properties
        if(isset($this->dealSettings['properties'])) {
            foreach($this->dealSettings['properties'] as $field => $value) {
                $properties[$field] = $value;
            }
        }

        // Create deal
        $this->deal->createDeal($properties);
        $this->dealId = $this->deal->getId();

        return $this->dealId;
    }

    /***************************************************
     * Update deal
     */
    public function updateDeal() {
        $properties = [];

        // Amount
        if(isset($this->dealSettings['amount'])) {
            $properties['amount'] = (float) $this->dealSettings['amount'];
        }

        // Dealname
        if(isset($this->dealSettings['name'])) {
            $properties['dealname'] = $this->dealSettings['name'];
        }

        // Stage
        if(isset($this->dealSettings['stage'])) {
            $properties['dealstage'] = $this->dealSettings['stage'];
        }

        if(isset($this->dealSettings['pipeline'])) {
            $properties['pipeline'] = $this->dealSettings['pipeline'];
        }

        // Closedate
        if(isset($this->dealSettings['closedate'])) {
            $properties['closedate'] = $this->dealSettings['closedate'];
        }

        // Properties
        if(isset($this->dealSettings['properties'])) {
            foreach($this->dealSettings['properties'] as $field => $value) {
                $properties[$field] = $value;
            }
        }

        // Create deal
        $this->deal->updateDeal($this->dealId, $properties);

        return $this->dealId;
    }

    /***************************************************
     * Create file
     */
    public function createFile() {
        if(!isset($this->fileSettings)) {
            return false;
        }

        $this->file->createFile($this->fileSettings);
        $this->fileId = $this->file->getId();
    }

    /***************************************************
     * Create note
     */
    public function createNote() {
        if(!isset($this->noteSettings)) {
            return false;
        }

        $this->note->createNoteAtDeal([
            'dealId' => $this->dealId,
            'fileId' => $this->fileId,
            'description' => (string) $this->noteSettings['description'],
        ]);
    }

    /***************************************************
     * Create formdata
     */
    public function createFormdata() {
        if(isset($this->formSettings)) {
            $this->form->createFormdata($this->formSettings);
        }
    }

    /***************************************************
     * Associate deal to contact
     */
    public function associateDealToContact($options) {
        $this->deal->associateDealToContact($options);
    }

    /***************************************************
     * Associate deal to company
     */
    public function associateDealToCompany($options) {
        $this->deal->associateDealToCompany($options);
    }

    /***************************************************
     * Associate company to contact
     */
    public function associateCompanyToContact($options) {
        $this->contact->associateCompanyToContact([
            'companyId' => $options['companyId'],
        ]);
    }

    /***************************************************
     * Associate company to parent
     */
    public function associateCompanyToParent($options) {
        $this->company-> associateCompany($options['companyChildId'], $options['companyParentId']);
    }

    /***************************************************
     * Get contact
     */
    public function getContact() {
        return $this->contact->getResult();
    }

    /***************************************************
     * Login
     */
    protected function login() {
        $this->login = new OAuth2();
        $this->hubspot = $this->login->login();
        $this->bearerToken = $this->login->getBearerToken();
    }

     /***************************************************
     * Is logged in
     */
    public function isLoggedIn() {
        return $this->login->isLoggedIn();
    }

    /***************************************************
     * Set access token
     */
    public function setCode(string $code) {
        return $this->login->setCode($code);
    }

    /***************************************************
     * Get Authenticate Url
     */
    public function getAuthenticateUrl() {
        return $this->login->getAuthenticateUrl();
    }

}
