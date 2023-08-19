<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Library\Hubspot;
use App\Library\Hubspot\contact;

class HubspotController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {

        $Hubspot = new Hubspot();

        if(!$Hubspot->isLoggedIn()) {
            return view('hubspotLogin', [
                'authUrl' => $Hubspot->getAuthenticateUrl()
            ]);
        }

        return view('hubspotconnected', [
        ]);
    }


    /**
     * OAuth2
     */
    public function oauth2(Request $request)
    {
        $Hubspot = new Hubspot();
        $Hubspot->setCode(request('code'));

        return redirect('/hubspot');
    }

    public function getDealById()
    {
        $Hubspot = new Hubspot();
        $filters = [
            // [
            //     'query' => 'testdeal',
            //     'property' => 'dealname'
            // ],
            [
                'query' => '33343935',
                'property' => 'pipeline',
            ],
        ];

        $result = $Hubspot->searchDealByProperty($filters);

        dd($result);
        return view('hubspotconnected');
    }

    public function getContactInfo()
    {
        $dealId = '8511697371';

        $Hubspot = new Hubspot();
        $contact = $Hubspot->getContactsByIds($dealId);

        
    }

}

