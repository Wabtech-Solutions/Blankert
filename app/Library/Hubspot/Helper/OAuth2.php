<?php
/***************************************************
 * Hubspot Contact
 * Version 0.1
 * 16-02-2022
 ***************************************************/
namespace App\Library\Hubspot\Helper;

use HubSpot\Factory;
use HubSpot\Utils\OAuth2 as OAuth2Helper;
use Storage;

class OAuth2
{
    /******************
     * Access Token
     */
    protected $accessToken;

    /******************
     * Refresh Token
     */
    protected $refreshToken;

    /******************
     * Expires At
     */
    protected $expiresAt;

    /******************
     * Authenticate Url
     */
    public $authenticateUrl;

    /***************************************************
     * Login
     */
    public function login() {
        if(!$this->getAccessToken()) {
            $this->generateAuthenticateUrl();
        }

        if(isset($this->hubspot)) {
            return $this->hubspot;
        }
    }

    /***************************************************
     * Is logged in
     */
    public function isLoggedIn() {
        if(isset($this->authenticateUrl) && $this->authenticateUrl != null) {
            return false;
        }

        return true;
    }

 /***************************************************
     * Generate Authenticate Url
     */
    protected function generateAuthenticateUrl() {
        $this->authenticateUrl = (string) OAuth2Helper::getAuthUrl(
            $this->getClientId(),
            $this->getRedirectUrl(),
            [
                'crm.schemas.contacts.write',
                'crm.schemas.deals.read',
                'crm.schemas.deals.write',
                'crm.objects.owners.read',
                'files',
                'crm.objects.contacts.write',
                'crm.lists.write',
                'crm.objects.companies.read',
                'crm.lists.read',
                'crm.objects.deals.read',
                'crm.schemas.contacts.read',
                'crm.objects.deals.write',
                'crm.objects.contacts.read',
                'crm.schemas.companies.read',
            ]
        );
    }

    /***************************************************
     * Set access token
     */
    public function setCode(string $code)
    {
        $tokens = Factory::create()->auth()->oAuth()->tokensApi()->createToken(
            'authorization_code',
            $code,
            $this->getRedirectUrl(),
            $this->getClientId(),
            $this->getClientSecret(),
        );

        if(isset($tokens)) {
            $this->setTokens($tokens);
        }
    }

    /***************************************************
     * Refresh token
     */
    protected function refreshToken() {
        $tokens = Factory::create()->auth()->oAuth()->tokensApi()->createToken(
            'refresh_token',
            null,
            $this->getRedirectUrl(),
            $this->getClientId(),
            $this->getClientSecret(),
            $this->refreshToken
        );

        if(isset($tokens)) {
            $this->setTokens($tokens);
        }
    }

    /***************************************************
     * Set tokens
     */
    protected function setTokens($tokens) {
        $this->accessToken = (string) $tokens->getAccessToken();
        $this->refreshToken = (string) $tokens->getRefreshToken();

        Storage::disk('local')->put('hubspot/settings', base64_encode(json_encode([
            'accessToken' => (string) $this->accessToken,
            'refreshToken' => (string) $this->refreshToken,
            'expiresAt' => time() + $tokens->getExpiresIn() * 0.95
        ])));
    }

    /***************************************************
     * Get Authenticate Url
     */
    public function getAuthenticateUrl() {
        return (string) $this->authenticateUrl;
    }

    /***************************************************
     * Get access token
     */
    protected function getAccessToken() {
         // File does not exists
         if (!Storage::disk('local')->exists('hubspot/settings')) {
            return false;
        }

        $settings = Storage::disk('local')->get('hubspot/settings');

        if(isset($settings)) {
            $tokens = json_decode(base64_decode($settings));

            if(isset($tokens)) {
                $this->accessToken = (string) $tokens->accessToken;
                $this->refreshToken = (string) $tokens->refreshToken;
                $this->expiresAt = (string) $tokens->expiresAt;

                if(time() > $this->expiresAt) {
                    $this->refreshToken();

                }
                echo ($this->accessToken);

                // Create HubSpot
                $this->hubspot = \HubSpot\Factory::createWithAccessToken($this->accessToken);

                return true;
            }
        }

        return false;
    }


    /***************************************************
     * Get Bearer Token
     */
    public function getBearerToken() {
        return $this->accessToken;
    }

    /***************************************************
     * Get Client Id
     */
    protected function getClientId() {
        return env('HUBSPOT_CLIENT_ID');
    }

    /***************************************************
     * Get Client Secret
     */
    protected function getClientSecret() {
        return env('HUBSPOT_CLIENT_SECRET');
    }

    /***************************************************
     * Get App Id
     */
    protected function getAppId() {
        return env('HUBSPOT_APP_ID');
    }

    /***************************************************
     * Get Redirect URL
     */
    protected function getRedirectUrl() {
        return env('APP_URL') . env('HUBSPOT_REDIRECT_URL');
    }
}
