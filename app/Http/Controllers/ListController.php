<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
        public function index()
        {
            return view('home');
        }

        public function store(Request $request)
        {
            $btw = $request->input('btw');
            session(['btw' => $btw]);

            // Haalt variabelen op voor de looptijden van de eerste auto
            $auto1Id = $request->input('auto1Id');
            session(['auto1Id' => $auto1Id]);
            $looptijd1Auto1 = $request->input('looptijd1Auto1');
            session(['looptijd1Auto1' => $looptijd1Auto1]);
            $looptijd2Auto1 = $request->input('looptijd2Auto1');
            session(['looptijd2Auto1' => $looptijd2Auto1]);
            $looptijd3Auto1 = $request->input('looptijd3Auto1');
            session(['looptijd3Auto1' => $looptijd3Auto1]);
            $looptijd4Auto1 = $request->input('looptijd4Auto1');
            session(['looptijd4Auto1' => $looptijd4Auto1]);

            // Haalt variabelen op voor de tarieven van de eerste looptijd voor de eerste auto
            $looptijd1Auto1Tarief1 = $request->input('looptijd1Auto1Tarief1');
            session(['looptijd1Auto1Tarief1' => $looptijd1Auto1Tarief1]);
            $looptijd1Auto1Tarief2 = $request->input('looptijd1Auto1Tarief2');
            session(['looptijd1Auto1Tarief2' => $looptijd1Auto1Tarief2]);
            $looptijd1Auto1Tarief3 = $request->input('looptijd1Auto1Tarief3');
            session(['looptijd1Auto1Tarief3' => $looptijd1Auto1Tarief3]);
            $looptijd1Auto1KM1 = $request->input('looptijd1Auto1KM1');
            session(['looptijd1Auto1KM1' => $looptijd1Auto1KM1]);
            $looptijd1Auto1KM2 = $request->input('looptijd1Auto1KM2');
            session(['looptijd1Auto1KM2' => $looptijd1Auto1KM2]);
            $looptijd1Auto1KM3 = $request->input('looptijd1Auto1KM3');
            session(['looptijd1Auto1KM3' => $looptijd1Auto1KM3]);

            $looptijd2Auto1Tarief1 = $request->input('looptijd2Auto1Tarief1');
            session(['looptijd2Auto1Tarief1' => $looptijd2Auto1Tarief1]);
            $looptijd2Auto1Tarief2 = $request->input('looptijd2Auto1Tarief2');
            session(['looptijd2Auto1Tarief2' => $looptijd2Auto1Tarief2]);
            $looptijd2Auto1Tarief3 = $request->input('looptijd2Auto1Tarief3');
            session(['looptijd2Auto1Tarief3' => $looptijd2Auto1Tarief3]);
            $looptijd2Auto1KM1 = $request->input('looptijd2Auto1KM1');
            session(['looptijd2Auto1KM1' => $looptijd2Auto1KM1]);
            $looptijd2Auto1KM2 = $request->input('looptijd2Auto1KM2');
            session(['looptijd2Auto1KM2' => $looptijd2Auto1KM2]);
            $looptijd2Auto1KM3 = $request->input('looptijd2Auto1KM3');
            session(['looptijd2Auto1KM3' => $looptijd2Auto1KM3]);

            $looptijd3Auto1Tarief1 = $request->input('looptijd3Auto1Tarief1');
            session(['looptijd3Auto1Tarief1' => $looptijd3Auto1Tarief1]);
            $looptijd3Auto1Tarief2 = $request->input('looptijd3Auto1Tarief2');
            session(['looptijd3Auto1Tarief2' => $looptijd3Auto1Tarief2]);
            $looptijd3Auto1Tarief3 = $request->input('looptijd3Auto1Tarief3');
            session(['looptijd3Auto1Tarief3' => $looptijd3Auto1Tarief3]);
            $looptijd3Auto1KM1 = $request->input('looptijd3Auto1KM1');
            session(['looptijd3Auto1KM1' => $looptijd3Auto1KM1]);
            $looptijd3Auto1KM2 = $request->input('looptijd3Auto1KM2');
            session(['looptijd3Auto1KM2' => $looptijd3Auto1KM2]);
            $looptijd3Auto1KM3 = $request->input('looptijd3Auto1KM3');
            session(['looptijd3Auto1KM3' => $looptijd3Auto1KM3]);

            $looptijd4Auto1Tarief1 = $request->input('looptijd4Auto1Tarief1');
            session(['looptijd4Auto1Tarief1' => $looptijd4Auto1Tarief1]);
            $looptijd4Auto1Tarief2 = $request->input('looptijd4Auto1Tarief2');
            session(['looptijd4Auto1Tarief2' => $looptijd4Auto1Tarief2]);
            $looptijd4Auto1Tarief3 = $request->input('looptijd4Auto1Tarief3');
            session(['looptijd4Auto1Tarief3' => $looptijd4Auto1Tarief3]);
            $looptijd4Auto1KM1 = $request->input('looptijd4Auto1KM1');
            session(['looptijd4Auto1KM1' => $looptijd4Auto1KM1]);
            $looptijd4Auto1KM2 = $request->input('looptijd4Auto1KM2');
            session(['looptijd4Auto1KM2' => $looptijd4Auto1KM2]);
            $looptijd4Auto1KM3 = $request->input('looptijd4Auto1KM3');
            session(['looptijd4Auto1KM3' => $looptijd4Auto1KM3]);

            $auto2Id = $request->input('auto2Id');
            session(['auto2Id' => $auto2Id]);
            $looptijd1Auto2 = $request->input('looptijd1Auto2');
            session(['looptijd1Auto2' => $looptijd1Auto2]);
            $looptijd2Auto2 = $request->input('looptijd2Auto2');
            session(['looptijd2Auto2' => $looptijd2Auto2]);
            $looptijd3Auto2 = $request->input('looptijd3Auto2');
            session(['looptijd3Auto2' => $looptijd3Auto2]);
            $looptijd4Auto2 = $request->input('looptijd4Auto2');
            session(['looptijd4Auto2' => $looptijd4Auto2]);

            // Haalt variabelen op voor de tarieven van de eerste looptijd voor de eerste auto
            $looptijd1Auto2Tarief1 = $request->input('looptijd1Auto2Tarief1');
            session(['looptijd1Auto2Tarief1' => $looptijd1Auto2Tarief1]);
            $looptijd1Auto2Tarief2 = $request->input('looptijd1Auto2Tarief2');
            session(['looptijd1Auto2Tarief2' => $looptijd1Auto2Tarief2]);
            $looptijd1Auto2Tarief3 = $request->input('looptijd1Auto2Tarief3');
            session(['looptijd1Auto2Tarief3' => $looptijd1Auto2Tarief3]);
            $looptijd1Auto2KM1 = $request->input('looptijd1Auto2KM1');
            session(['looptijd1Auto2KM1' => $looptijd1Auto2KM1]);
            $looptijd1Auto2KM2 = $request->input('looptijd1Auto2KM2');
            session(['looptijd1Auto2KM2' => $looptijd1Auto2KM2]);
            $looptijd1Auto2KM3 = $request->input('looptijd1Auto2KM3');
            session(['looptijd1Auto2KM3' => $looptijd1Auto2KM3]);

            $looptijd2Auto2Tarief1 = $request->input('looptijd2Auto2Tarief1');
            session(['looptijd2Auto2Tarief1' => $looptijd2Auto2Tarief1]);
            $looptijd2Auto2Tarief2 = $request->input('looptijd2Auto2Tarief2');
            session(['looptijd2Auto2Tarief2' => $looptijd2Auto2Tarief2]);
            $looptijd2Auto2Tarief3 = $request->input('looptijd2Auto2Tarief3');
            session(['looptijd2Auto2Tarief3' => $looptijd2Auto2Tarief3]);
            $looptijd2Auto2KM1 = $request->input('looptijd2Auto2KM1');
            session(['looptijd2Auto2KM1' => $looptijd2Auto2KM1]);
            $looptijd2Auto2KM2 = $request->input('looptijd2Auto2KM2');
            session(['looptijd2Auto2KM2' => $looptijd2Auto2KM2]);
            $looptijd2Auto2KM3 = $request->input('looptijd2Auto2KM3');
            session(['looptijd2Auto2KM3' => $looptijd2Auto2KM3]);

            $looptijd3Auto2Tarief1 = $request->input('looptijd3Auto2Tarief1');
            session(['looptijd3Auto2Tarief1' => $looptijd3Auto2Tarief1]);
            $looptijd3Auto2Tarief2 = $request->input('looptijd3Auto2Tarief2');
            session(['looptijd3Auto2Tarief2' => $looptijd3Auto2Tarief2]);
            $looptijd3Auto2Tarief3 = $request->input('looptijd3Auto2Tarief3');
            session(['looptijd3Auto2Tarief3' => $looptijd3Auto2Tarief3]);
            $looptijd3Auto2KM1 = $request->input('looptijd3Auto2KM1');
            session(['looptijd3Auto2KM1' => $looptijd3Auto2KM1]);
            $looptijd3Auto2KM2 = $request->input('looptijd3Auto2KM2');
            session(['looptijd3Auto2KM2' => $looptijd3Auto2KM2]);
            $looptijd3Auto2KM3 = $request->input('looptijd3Auto2KM3');
            session(['looptijd3Auto2KM3' => $looptijd3Auto2KM3]);

            $looptijd4Auto2Tarief1 = $request->input('looptijd4Auto2Tarief1');
            session(['looptijd4Auto2Tarief1' => $looptijd4Auto2Tarief1]);
            $looptijd4Auto2Tarief2 = $request->input('looptijd4Auto2Tarief2');
            session(['looptijd4Auto2Tarief2' => $looptijd4Auto2Tarief2]);
            $looptijd4Auto2Tarief3 = $request->input('looptijd4Auto2Tarief3');
            session(['looptijd4Auto2Tarief3' => $looptijd4Auto2Tarief3]);
            $looptijd4Auto2KM1 = $request->input('looptijd4Auto2KM1');
            session(['looptijd4Auto2KM1' => $looptijd4Auto2KM1]);
            $looptijd4Auto2KM2 = $request->input('looptijd4Auto2KM2');
            session(['looptijd4Auto2KM2' => $looptijd4Auto2KM2]);
            $looptijd4Auto2KM3 = $request->input('looptijd4Auto2KM3');
            session(['looptijd4Auto2KM3' => $looptijd4Auto2KM3]);

            $auto3Id = $request->input('auto3Id');
            session(['auto3Id' => $auto3Id]);
            $looptijd1auto3 = $request->input('looptijd1auto3');
            session(['looptijd1auto3' => $looptijd1auto3]);
            $looptijd2auto3 = $request->input('looptijd2auto3');
            session(['looptijd2auto3' => $looptijd2auto3]);
            $looptijd3auto3 = $request->input('looptijd3auto3');
            session(['looptijd3auto3' => $looptijd3auto3]);
            $looptijd4auto3 = $request->input('looptijd4auto3');
            session(['looptijd4auto3' => $looptijd4auto3]);

            // Haalt variabelen op voor de tarieven van de eerste looptijd voor de eerste auto
            $looptijd1auto3Tarief1 = $request->input('looptijd1auto3Tarief1');
            session(['looptijd1auto3Tarief1' => $looptijd1auto3Tarief1]);
            $looptijd1auto3Tarief2 = $request->input('looptijd1auto3Tarief2');
            session(['looptijd1auto3Tarief2' => $looptijd1auto3Tarief2]);
            $looptijd1auto3Tarief3 = $request->input('looptijd1auto3Tarief3');
            session(['looptijd1auto3Tarief3' => $looptijd1auto3Tarief3]);
            $looptijd1auto3KM1 = $request->input('looptijd1auto3KM1');
            session(['looptijd1auto3KM1' => $looptijd1auto3KM1]);
            $looptijd1auto3KM2 = $request->input('looptijd1auto3KM2');
            session(['looptijd1auto3KM2' => $looptijd1auto3KM2]);
            $looptijd1auto3KM3 = $request->input('looptijd1auto3KM3');
            session(['looptijd1auto3KM3' => $looptijd1auto3KM3]);

            $looptijd2auto3Tarief1 = $request->input('looptijd2auto3Tarief1');
            session(['looptijd2auto3Tarief1' => $looptijd2auto3Tarief1]);
            $looptijd2auto3Tarief2 = $request->input('looptijd2auto3Tarief2');
            session(['looptijd2auto3Tarief2' => $looptijd2auto3Tarief2]);
            $looptijd2auto3Tarief3 = $request->input('looptijd2auto3Tarief3');
            session(['looptijd2auto3Tarief3' => $looptijd2auto3Tarief3]);
            $looptijd2auto3KM1 = $request->input('looptijd2auto3KM1');
            session(['looptijd2auto3KM1' => $looptijd2auto3KM1]);
            $looptijd2auto3KM2 = $request->input('looptijd2auto3KM2');
            session(['looptijd2auto3KM2' => $looptijd2auto3KM2]);
            $looptijd2auto3KM3 = $request->input('looptijd2auto3KM3');
            session(['looptijd2auto3KM3' => $looptijd2auto3KM3]);

            $looptijd3auto3Tarief1 = $request->input('looptijd3auto3Tarief1');
            session(['looptijd3auto3Tarief1' => $looptijd3auto3Tarief1]);
            $looptijd3auto3Tarief2 = $request->input('looptijd3auto3Tarief2');
            session(['looptijd3auto3Tarief2' => $looptijd3auto3Tarief2]);
            $looptijd3auto3Tarief3 = $request->input('looptijd3auto3Tarief3');
            session(['looptijd3auto3Tarief3' => $looptijd3auto3Tarief3]);
            $looptijd3auto3KM1 = $request->input('looptijd3auto3KM1');
            session(['looptijd3auto3KM1' => $looptijd3auto3KM1]);
            $looptijd3auto3KM2 = $request->input('looptijd3auto3KM2');
            session(['looptijd3auto3KM2' => $looptijd3auto3KM2]);
            $looptijd3auto3KM3 = $request->input('looptijd3auto3KM3');
            session(['looptijd3auto3KM3' => $looptijd3auto3KM3]);

            $looptijd4auto3Tarief1 = $request->input('looptijd4auto3Tarief1');
            session(['looptijd4auto3Tarief1' => $looptijd4auto3Tarief1]);
            $looptijd4auto3Tarief2 = $request->input('looptijd4auto3Tarief2');
            session(['looptijd4auto3Tarief2' => $looptijd4auto3Tarief2]);
            $looptijd4auto3Tarief3 = $request->input('looptijd4auto3Tarief3');
            session(['looptijd4auto3Tarief3' => $looptijd4auto3Tarief3]);
            $looptijd4auto3KM1 = $request->input('looptijd4auto3KM1');
            session(['looptijd4auto3KM1' => $looptijd4auto3KM1]);
            $looptijd4auto3KM2 = $request->input('looptijd4auto3KM2');
            session(['looptijd4auto3KM2' => $looptijd4auto3KM2]);
            $looptijd4auto3KM3 = $request->input('looptijd4auto3KM3');
            session(['looptijd4auto3KM3' => $looptijd4auto3KM3]);

            $auto4Id = $request->input('auto4Id');
            session(['auto4Id' => $auto4Id]);
            $looptijd1auto4 = $request->input('looptijd1auto4');
            session(['looptijd1auto4' => $looptijd1auto4]);
            $looptijd2auto4 = $request->input('looptijd2auto4');
            session(['looptijd2auto4' => $looptijd2auto4]);
            $looptijd3auto4 = $request->input('looptijd3auto4');
            session(['looptijd3auto4' => $looptijd3auto4]);
            $looptijd4auto4 = $request->input('looptijd4auto4');
            session(['looptijd4auto4' => $looptijd4auto4]);

            // Haalt variabelen op voor de tarieven van de eerste looptijd voor de eerste auto
            $looptijd1auto4Tarief1 = $request->input('looptijd1auto4Tarief1');
            session(['looptijd1auto4Tarief1' => $looptijd1auto4Tarief1]);
            $looptijd1auto4Tarief2 = $request->input('looptijd1auto4Tarief2');
            session(['looptijd1auto4Tarief2' => $looptijd1auto4Tarief2]);
            $looptijd1auto4Tarief3 = $request->input('looptijd1auto4Tarief3');
            session(['looptijd1auto4Tarief3' => $looptijd1auto4Tarief3]);
            $looptijd1auto4KM1 = $request->input('looptijd1auto4KM1');
            session(['looptijd1auto4KM1' => $looptijd1auto4KM1]);
            $looptijd1auto4KM2 = $request->input('looptijd1auto4KM2');
            session(['looptijd1auto4KM2' => $looptijd1auto4KM2]);
            $looptijd1auto4KM3 = $request->input('looptijd1auto4KM3');
            session(['looptijd1auto4KM3' => $looptijd1auto4KM3]);

            $looptijd2auto4Tarief1 = $request->input('looptijd2auto4Tarief1');
            session(['looptijd2auto4Tarief1' => $looptijd2auto4Tarief1]);
            $looptijd2auto4Tarief2 = $request->input('looptijd2auto4Tarief2');
            session(['looptijd2auto4Tarief2' => $looptijd2auto4Tarief2]);
            $looptijd2auto4Tarief3 = $request->input('looptijd2auto4Tarief3');
            session(['looptijd2auto4Tarief3' => $looptijd2auto4Tarief3]);
            $looptijd2auto4KM1 = $request->input('looptijd2auto4KM1');
            session(['looptijd2auto4KM1' => $looptijd2auto4KM1]);
            $looptijd2auto4KM2 = $request->input('looptijd2auto4KM2');
            session(['looptijd2auto4KM2' => $looptijd2auto4KM2]);
            $looptijd2auto4KM3 = $request->input('looptijd2auto4KM3');
            session(['looptijd2auto4KM3' => $looptijd2auto4KM3]);

            $looptijd3auto4Tarief1 = $request->input('looptijd3auto4Tarief1');
            session(['looptijd3auto4Tarief1' => $looptijd3auto4Tarief1]);
            $looptijd3auto4Tarief2 = $request->input('looptijd3auto4Tarief2');
            session(['looptijd3auto4Tarief2' => $looptijd3auto4Tarief2]);
            $looptijd3auto4Tarief3 = $request->input('looptijd3auto4Tarief3');
            session(['looptijd3auto4Tarief3' => $looptijd3auto4Tarief3]);
            $looptijd3auto4KM1 = $request->input('looptijd3auto4KM1');
            session(['looptijd3auto4KM1' => $looptijd3auto4KM1]);
            $looptijd3auto4KM2 = $request->input('looptijd3auto4KM2');
            session(['looptijd3auto4KM2' => $looptijd3auto4KM2]);
            $looptijd3auto4KM3 = $request->input('looptijd3auto4KM3');
            session(['looptijd3auto4KM3' => $looptijd3auto4KM3]);

            $looptijd4auto4Tarief1 = $request->input('looptijd4auto4Tarief1');
            session(['looptijd4auto4Tarief1' => $looptijd4auto4Tarief1]);
            $looptijd4auto4Tarief2 = $request->input('looptijd4auto4Tarief2');
            session(['looptijd4auto4Tarief2' => $looptijd4auto4Tarief2]);
            $looptijd4auto4Tarief3 = $request->input('looptijd4auto4Tarief3');
            session(['looptijd4auto4Tarief3' => $looptijd4auto4Tarief3]);
            $looptijd4auto4KM1 = $request->input('looptijd4auto4KM1');
            session(['looptijd4auto4KM1' => $looptijd4auto4KM1]);
            $looptijd4auto4KM2 = $request->input('looptijd4auto4KM2');
            session(['looptijd4auto4KM2' => $looptijd4auto4KM2]);
            $looptijd4auto4KM3 = $request->input('looptijd4auto4KM3');
            session(['looptijd4auto4KM3' => $looptijd4auto4KM3]);

            $auto5Id = $request->input('auto5Id');
            session(['auto5Id' => $auto5Id]);
            $looptijd1auto5 = $request->input('looptijd1auto5');
            session(['looptijd1auto5' => $looptijd1auto5]);
            $looptijd2auto5 = $request->input('looptijd2auto5');
            session(['looptijd2auto5' => $looptijd2auto5]);
            $looptijd3auto5 = $request->input('looptijd3auto5');
            session(['looptijd3auto5' => $looptijd3auto5]);
            $looptijd4auto5 = $request->input('looptijd4auto5');
            session(['looptijd4auto5' => $looptijd4auto5]);

            // Haalt variabelen op voor de tarieven van de eerste looptijd voor de eerste auto
            $looptijd1auto5Tarief1 = $request->input('looptijd1auto5Tarief1');
            session(['looptijd1auto5Tarief1' => $looptijd1auto5Tarief1]);
            $looptijd1auto5Tarief2 = $request->input('looptijd1auto5Tarief2');
            session(['looptijd1auto5Tarief2' => $looptijd1auto5Tarief2]);
            $looptijd1auto5Tarief3 = $request->input('looptijd1auto5Tarief3');
            session(['looptijd1auto5Tarief3' => $looptijd1auto5Tarief3]);
            $looptijd1auto5KM1 = $request->input('looptijd1auto5KM1');
            session(['looptijd1auto5KM1' => $looptijd1auto5KM1]);
            $looptijd1auto5KM2 = $request->input('looptijd1auto5KM2');
            session(['looptijd1auto5KM2' => $looptijd1auto5KM2]);
            $looptijd1auto5KM3 = $request->input('looptijd1auto5KM3');
            session(['looptijd1auto5KM3' => $looptijd1auto5KM3]);

            $looptijd2auto5Tarief1 = $request->input('looptijd2auto5Tarief1');
            session(['looptijd2auto5Tarief1' => $looptijd2auto5Tarief1]);
            $looptijd2auto5Tarief2 = $request->input('looptijd2auto5Tarief2');
            session(['looptijd2auto5Tarief2' => $looptijd2auto5Tarief2]);
            $looptijd2auto5Tarief3 = $request->input('looptijd2auto5Tarief3');
            session(['looptijd2auto5Tarief3' => $looptijd2auto5Tarief3]);
            $looptijd2auto5KM1 = $request->input('looptijd2auto5KM1');
            session(['looptijd2auto5KM1' => $looptijd2auto5KM1]);
            $looptijd2auto5KM2 = $request->input('looptijd2auto5KM2');
            session(['looptijd2auto5KM2' => $looptijd2auto5KM2]);
            $looptijd2auto5KM3 = $request->input('looptijd2auto5KM3');
            session(['looptijd2auto5KM3' => $looptijd2auto5KM3]);

            $looptijd3auto5Tarief1 = $request->input('looptijd3auto5Tarief1');
            session(['looptijd3auto5Tarief1' => $looptijd3auto5Tarief1]);
            $looptijd3auto5Tarief2 = $request->input('looptijd3auto5Tarief2');
            session(['looptijd3auto5Tarief2' => $looptijd3auto5Tarief2]);
            $looptijd3auto5Tarief3 = $request->input('looptijd3auto5Tarief3');
            session(['looptijd3auto5Tarief3' => $looptijd3auto5Tarief3]);
            $looptijd3auto5KM1 = $request->input('looptijd3auto5KM1');
            session(['looptijd3auto5KM1' => $looptijd3auto5KM1]);
            $looptijd3auto5KM2 = $request->input('looptijd3auto5KM2');
            session(['looptijd3auto5KM2' => $looptijd3auto5KM2]);
            $looptijd3auto5KM3 = $request->input('looptijd3auto5KM3');
            session(['looptijd3auto5KM3' => $looptijd3auto5KM3]);

            $looptijd4auto5Tarief1 = $request->input('looptijd4auto5Tarief1');
            session(['looptijd4auto5Tarief1' => $looptijd4auto5Tarief1]);
            $looptijd4auto5Tarief2 = $request->input('looptijd4auto5Tarief2');
            session(['looptijd4auto5Tarief2' => $looptijd4auto5Tarief2]);
            $looptijd4auto5Tarief3 = $request->input('looptijd4auto5Tarief3');
            session(['looptijd4auto5Tarief3' => $looptijd4auto5Tarief3]);
            $looptijd4auto5KM1 = $request->input('looptijd4auto5KM1');
            session(['looptijd4auto5KM1' => $looptijd4auto5KM1]);
            $looptijd4auto5KM2 = $request->input('looptijd4auto5KM2');
            session(['looptijd4auto5KM2' => $looptijd4auto5KM2]);
            $looptijd4auto5KM3 = $request->input('looptijd4auto5KM3');
            session(['looptijd4auto5KM3' => $looptijd4auto5KM3]);

            return response()->json(['success' => true]);
        }

        public function show()
        {
            return view('pdf');
        }

    }

