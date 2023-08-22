<head>
    <link href="{{ public_path('css/pdf.css') }}" rel="stylesheet" type="text/css" />
    <link href="/css/pdf.css" rel="stylesheet" type="text/css" />
    <script src="/js/pdf.js"></script>
    <script src="{{ public_path('/js/pdf.js') }}"></script>
</head>

@php

    $auto1Id = session('auto1Id');

    $xml = simplexml_load_file('https://www.blankertshortlease.nl/feed-leasevergelijker.xml');

    $auto = $xml->xpath("//post[id='$auto1Id']");

    if (!empty($auto)) {
        $MerkAuto1 = (string) $auto[0]->Merk;
        $TypeAuto1 = (string) $auto[0]->Type;
        $UitvoeringAuto1 = (string) $auto[0]->Uitvoering;
        $AfbeeldinggAuto1 = (string) $auto[0]->Afbeelding;
        $BrandstofAuto1 = (string) $auto[0]->Brandstof;
        $TransmissieAuto1 = (string) $auto[0]->Transmissie;
        $FiscaleWaardeAuto1 = (string) $auto[0]->FiscaleWaarde;
        $BijtellingAuto1 = (string) $auto[0]->Bijtelling;
        $URLgAuto1 = (string) $auto[0]->URL;
    } else {
        echo 'Geen auto gevonden met het opgegeven ID.';
    }

    $auto2Id = session('auto2Id');

    $auto2 = $xml->xpath("//post[id='$auto2Id']");

    if (!empty($auto2)) {
        $Merkauto2 = (string) $auto2[0]->Merk;
        $Typeauto2 = (string) $auto2[0]->Type;
        $Uitvoeringauto2 = (string) $auto2[0]->Uitvoering;
        $Afbeeldinggauto2 = (string) $auto2[0]->Afbeelding;
        $Brandstofauto2 = (string) $auto2[0]->Brandstof;
        $Transmissieauto2 = (string) $auto2[0]->Transmissie;
        $FiscaleWaardeauto2 = (string) $auto2[0]->FiscaleWaarde;
        $Bijtellingauto2 = (string) $auto2[0]->Bijtelling;
        $URLgauto2 = (string) $auto2[0]->URL;
    } else {
    }

    $auto3Id = session('auto3Id');

    $auto3 = $xml->xpath("//post[id='$auto3Id']");

    if (!empty($auto3)) {
        $Merkauto3 = (string) $auto3[0]->Merk;
        $Typeauto3 = (string) $auto3[0]->Type;
        $Uitvoeringauto3 = (string) $auto3[0]->Uitvoering;
        $Afbeeldinggauto3 = (string) $auto3[0]->Afbeelding;
        $Brandstofauto3 = (string) $auto3[0]->Brandstof;
        $Transmissieauto3 = (string) $auto3[0]->Transmissie;
        $FiscaleWaardeauto3 = (string) $auto3[0]->FiscaleWaarde;
        $Bijtellingauto3 = (string) $auto3[0]->Bijtelling;
        $URLgauto3 = (string) $auto3[0]->URL;
    } else {
    }

    $auto4Id = session('auto4Id');

    $auto4 = $xml->xpath("//post[id='$auto4Id']");

    if (!empty($auto4)) {
        $Merkauto4 = (string) $auto4[0]->Merk;
        $Typeauto4 = (string) $auto4[0]->Type;
        $Uitvoeringauto4 = (string) $auto4[0]->Uitvoering;
        $Afbeeldinggauto4 = (string) $auto4[0]->Afbeelding;
        $Brandstofauto4 = (string) $auto4[0]->Brandstof;
        $Transmissieauto4 = (string) $auto4[0]->Transmissie;
        $FiscaleWaardeauto4 = (string) $auto4[0]->FiscaleWaarde;
        $Bijtellingauto4 = (string) $auto4[0]->Bijtelling;
        $URLgauto4 = (string) $auto4[0]->URL;
    } else {
    }

    $auto5Id = session('auto5Id');

    $auto5 = $xml->xpath("//post[id='$auto5Id']");

    if (!empty($auto5)) {
        $Merkauto5 = (string) $auto5[0]->Merk;
        $Typeauto5 = (string) $auto5[0]->Type;
        $Uitvoeringauto5 = (string) $auto5[0]->Uitvoering;
        $Afbeeldinggauto5 = (string) $auto5[0]->Afbeelding;
        $Brandstofauto5 = (string) $auto5[0]->Brandstof;
        $Transmissieauto5 = (string) $auto5[0]->Transmissie;
        $FiscaleWaardeauto5 = (string) $auto5[0]->FiscaleWaarde;
        $Bijtellingauto5 = (string) $auto5[0]->Bijtelling;
        $URLgauto5 = (string) $auto5[0]->URL;
    } else {
    }

    $btw = session('btw');

    $looptijd1Auto1 = session('looptijd1Auto1');
    $looptijd2Auto1 = session('looptijd2Auto1');
    $looptijd3Auto1 = session('looptijd3Auto1');
    $looptijd4Auto1 = session('looptijd4Auto1');
    $looptijd1Auto1Tarief1 = session('looptijd1Auto1Tarief1');
    $looptijd1Auto1Tarief2 = session('looptijd1Auto1Tarief2');
    $looptijd1Auto1Tarief3 = session('looptijd1Auto1Tarief3');
    $looptijd1Auto1KM1 = session('looptijd1Auto1KM1');
    $looptijd1Auto1KM2 = session('looptijd1Auto1KM2');
    $looptijd1Auto1KM3 = session('looptijd1Auto1KM3');

    $looptijd2Auto1 = session('looptijd2Auto1');
    $looptijd2Auto1 = session('looptijd2Auto1');
    $looptijd3Auto1 = session('looptijd3Auto1');
    $looptijd4Auto1 = session('looptijd4Auto1');
    $looptijd2Auto1Tarief1 = session('looptijd2Auto1Tarief1');
    $looptijd2Auto1Tarief2 = session('looptijd2Auto1Tarief2');
    $looptijd2Auto1Tarief3 = session('looptijd2Auto1Tarief3');
    $looptijd2Auto1KM1 = session('looptijd2Auto1KM1');
    $looptijd2Auto1KM2 = session('looptijd2Auto1KM2');
    $looptijd2Auto1KM3 = session('looptijd2Auto1KM3');

    $looptijd3Auto1 = session('looptijd3Auto1');
    $looptijd3Auto1 = session('looptijd3Auto1');
    $looptijd3Auto1 = session('looptijd3Auto1');
    $looptijd4Auto1 = session('looptijd4Auto1');
    $looptijd3Auto1Tarief1 = session('looptijd3Auto1Tarief1');
    $looptijd3Auto1Tarief2 = session('looptijd3Auto1Tarief2');
    $looptijd3Auto1Tarief3 = session('looptijd3Auto1Tarief3');
    $looptijd3Auto1KM1 = session('looptijd3Auto1KM1');
    $looptijd3Auto1KM2 = session('looptijd3Auto1KM2');
    $looptijd3Auto1KM3 = session('looptijd3Auto1KM3');

    $looptijd4Auto1 = session('looptijd4Auto1');
    $looptijd4Auto1 = session('looptijd4Auto1');
    $looptijd4Auto1 = session('looptijd4Auto1');
    $looptijd4Auto1 = session('looptijd4Auto1');
    $looptijd4Auto1Tarief1 = session('looptijd4Auto1Tarief1');
    $looptijd4Auto1Tarief2 = session('looptijd4Auto1Tarief2');
    $looptijd4Auto1Tarief3 = session('looptijd4Auto1Tarief3');
    $looptijd4Auto1KM1 = session('looptijd4Auto1KM1');
    $looptijd4Auto1KM2 = session('looptijd4Auto1KM2');
    $looptijd4Auto1KM3 = session('looptijd4Auto1KM3');

    $looptijd1auto2 = session('looptijd1auto2');
    $looptijd2auto2 = session('looptijd2auto2');
    $looptijd3auto2 = session('looptijd3auto2');
    $looptijd4auto2 = session('looptijd4auto2');
    $looptijd1auto2Tarief1 = session('looptijd1auto2Tarief1');
    $looptijd1auto2Tarief2 = session('looptijd1auto2Tarief2');
    $looptijd1auto2Tarief3 = session('looptijd1auto2Tarief3');
    $looptijd1auto2KM1 = session('looptijd1auto2KM1');
    $looptijd1auto2KM2 = session('looptijd1auto2KM2');
    $looptijd1auto2KM3 = session('looptijd1auto2KM3');

    $looptijd2auto2 = session('looptijd2auto2');
    $looptijd2auto2 = session('looptijd2auto2');
    $looptijd3auto2 = session('looptijd3auto2');
    $looptijd4auto2 = session('looptijd4auto2');
    $looptijd2auto2Tarief1 = session('looptijd2auto2Tarief1');
    $looptijd2auto2Tarief2 = session('looptijd2auto2Tarief2');
    $looptijd2auto2Tarief3 = session('looptijd2auto2Tarief3');
    $looptijd2auto2KM1 = session('looptijd2auto2KM1');
    $looptijd2auto2KM2 = session('looptijd2auto2KM2');
    $looptijd2auto2KM3 = session('looptijd2auto2KM3');

    $looptijd3auto2 = session('looptijd3auto2');
    $looptijd3auto2 = session('looptijd3auto2');
    $looptijd3auto2 = session('looptijd3auto2');
    $looptijd4auto2 = session('looptijd4auto2');
    $looptijd3auto2Tarief1 = session('looptijd3auto2Tarief1');
    $looptijd3auto2Tarief2 = session('looptijd3auto2Tarief2');
    $looptijd3auto2Tarief3 = session('looptijd3auto2Tarief3');
    $looptijd3auto2KM1 = session('looptijd3auto2KM1');
    $looptijd3auto2KM2 = session('looptijd3auto2KM2');
    $looptijd3auto2KM3 = session('looptijd3auto2KM3');

    $looptijd4auto2 = session('looptijd4auto2');
    $looptijd4auto2 = session('looptijd4auto2');
    $looptijd4auto2 = session('looptijd4auto2');
    $looptijd4auto2 = session('looptijd4auto2');
    $looptijd4auto2Tarief1 = session('looptijd4auto2Tarief1');
    $looptijd4auto2Tarief2 = session('looptijd4auto2Tarief2');
    $looptijd4auto2Tarief3 = session('looptijd4auto2Tarief3');
    $looptijd4auto2KM1 = session('looptijd4auto2KM1');
    $looptijd4auto2KM2 = session('looptijd4auto2KM2');
    $looptijd4auto2KM3 = session('looptijd4auto2KM3');

    $looptijd1auto3 = session('looptijd1auto3');
    $looptijd2auto3 = session('looptijd2auto3');
    $looptijd3auto3 = session('looptijd3auto3');
    $looptijd4auto3 = session('looptijd4auto3');
    $looptijd1auto3Tarief1 = session('looptijd1auto3Tarief1');
    $looptijd1auto3Tarief2 = session('looptijd1auto3Tarief2');
    $looptijd1auto3Tarief3 = session('looptijd1auto3Tarief3');
    $looptijd1auto3KM1 = session('looptijd1auto3KM1');
    $looptijd1auto3KM2 = session('looptijd1auto3KM2');
    $looptijd1auto3KM3 = session('looptijd1auto3KM3');

    $looptijd2auto3 = session('looptijd2auto3');
    $looptijd2auto3 = session('looptijd2auto3');
    $looptijd3auto3 = session('looptijd3auto3');
    $looptijd4auto3 = session('looptijd4auto3');
    $looptijd2auto3Tarief1 = session('looptijd2auto3Tarief1');
    $looptijd2auto3Tarief2 = session('looptijd2auto3Tarief2');
    $looptijd2auto3Tarief3 = session('looptijd2auto3Tarief3');
    $looptijd2auto3KM1 = session('looptijd2auto3KM1');
    $looptijd2auto3KM2 = session('looptijd2auto3KM2');
    $looptijd2auto3KM3 = session('looptijd2auto3KM3');

    $looptijd3auto3 = session('looptijd3auto3');
    $looptijd3auto3 = session('looptijd3auto3');
    $looptijd3auto3 = session('looptijd3auto3');
    $looptijd4auto3 = session('looptijd4auto3');
    $looptijd3auto3Tarief1 = session('looptijd3auto3Tarief1');
    $looptijd3auto3Tarief2 = session('looptijd3auto3Tarief2');
    $looptijd3auto3Tarief3 = session('looptijd3auto3Tarief3');
    $looptijd3auto3KM1 = session('looptijd3auto3KM1');
    $looptijd3auto3KM2 = session('looptijd3auto3KM2');
    $looptijd3auto3KM3 = session('looptijd3auto3KM3');

    $looptijd4auto3 = session('looptijd4auto3');
    $looptijd4auto3 = session('looptijd4auto3');
    $looptijd4auto3 = session('looptijd4auto3');
    $looptijd4auto3 = session('looptijd4auto3');
    $looptijd4auto3Tarief1 = session('looptijd4auto3Tarief1');
    $looptijd4auto3Tarief2 = session('looptijd4auto3Tarief2');
    $looptijd4auto3Tarief3 = session('looptijd4auto3Tarief3');
    $looptijd4auto3KM1 = session('looptijd4auto3KM1');
    $looptijd4auto3KM2 = session('looptijd4auto3KM2');
    $looptijd4auto3KM3 = session('looptijd4auto3KM3');

    $looptijd1auto4 = session('looptijd1auto4');
    $looptijd2auto4 = session('looptijd2auto4');
    $looptijd3auto4 = session('looptijd3auto4');
    $looptijd4auto4 = session('looptijd4auto4');
    $looptijd1auto4Tarief1 = session('looptijd1auto4Tarief1');
    $looptijd1auto4Tarief2 = session('looptijd1auto4Tarief2');
    $looptijd1auto4Tarief3 = session('looptijd1auto4Tarief3');
    $looptijd1auto4KM1 = session('looptijd1auto4KM1');
    $looptijd1auto4KM2 = session('looptijd1auto4KM2');
    $looptijd1auto4KM3 = session('looptijd1auto4KM3');

    $looptijd2auto4 = session('looptijd2auto4');
    $looptijd2auto4 = session('looptijd2auto4');
    $looptijd3auto4 = session('looptijd3auto4');
    $looptijd4auto4 = session('looptijd4auto4');
    $looptijd2auto4Tarief1 = session('looptijd2auto4Tarief1');
    $looptijd2auto4Tarief2 = session('looptijd2auto4Tarief2');
    $looptijd2auto4Tarief3 = session('looptijd2auto4Tarief3');
    $looptijd2auto4KM1 = session('looptijd2auto4KM1');
    $looptijd2auto4KM2 = session('looptijd2auto4KM2');
    $looptijd2auto4KM3 = session('looptijd2auto4KM3');

    $looptijd3auto4 = session('looptijd3auto4');
    $looptijd3auto4 = session('looptijd3auto4');
    $looptijd3auto4 = session('looptijd3auto4');
    $looptijd4auto4 = session('looptijd4auto4');
    $looptijd3auto4Tarief1 = session('looptijd3auto4Tarief1');
    $looptijd3auto4Tarief2 = session('looptijd3auto4Tarief2');
    $looptijd3auto4Tarief3 = session('looptijd3auto4Tarief3');
    $looptijd3auto4KM1 = session('looptijd3auto4KM1');
    $looptijd3auto4KM2 = session('looptijd3auto4KM2');
    $looptijd3auto4KM3 = session('looptijd3auto4KM3');

    $looptijd4auto4 = session('looptijd4auto4');
    $looptijd4auto4 = session('looptijd4auto4');
    $looptijd4auto4 = session('looptijd4auto4');
    $looptijd4auto4 = session('looptijd4auto4');
    $looptijd4auto4Tarief1 = session('looptijd4auto4Tarief1');
    $looptijd4auto4Tarief2 = session('looptijd4auto4Tarief2');
    $looptijd4auto4Tarief3 = session('looptijd4auto4Tarief3');
    $looptijd4auto4KM1 = session('looptijd4auto4KM1');
    $looptijd4auto4KM2 = session('looptijd4auto4KM2');
    $looptijd4auto4KM3 = session('looptijd4auto4KM3');

    $looptijd1auto5 = session('looptijd1auto5');
    $looptijd2auto5 = session('looptijd2auto5');
    $looptijd3auto5 = session('looptijd3auto5');
    $looptijd4auto5 = session('looptijd4auto5');
    $looptijd1auto5Tarief1 = session('looptijd1auto5Tarief1');
    $looptijd1auto5Tarief2 = session('looptijd1auto5Tarief2');
    $looptijd1auto5Tarief3 = session('looptijd1auto5Tarief3');
    $looptijd1auto5KM1 = session('looptijd1auto5KM1');
    $looptijd1auto5KM2 = session('looptijd1auto5KM2');
    $looptijd1auto5KM3 = session('looptijd1auto5KM3');

    $looptijd2auto5 = session('looptijd2auto5');
    $looptijd2auto5 = session('looptijd2auto5');
    $looptijd3auto5 = session('looptijd3auto5');
    $looptijd4auto5 = session('looptijd4auto5');
    $looptijd2auto5Tarief1 = session('looptijd2auto5Tarief1');
    $looptijd2auto5Tarief2 = session('looptijd2auto5Tarief2');
    $looptijd2auto5Tarief3 = session('looptijd2auto5Tarief3');
    $looptijd2auto5KM1 = session('looptijd2auto5KM1');
    $looptijd2auto5KM2 = session('looptijd2auto5KM2');
    $looptijd2auto5KM3 = session('looptijd2auto5KM3');

    $looptijd3auto5 = session('looptijd3auto5');
    $looptijd3auto5 = session('looptijd3auto5');
    $looptijd3auto5 = session('looptijd3auto5');
    $looptijd4auto5 = session('looptijd4auto5');
    $looptijd3auto5Tarief1 = session('looptijd3auto5Tarief1');
    $looptijd3auto5Tarief2 = session('looptijd3auto5Tarief2');
    $looptijd3auto5Tarief3 = session('looptijd3auto5Tarief3');
    $looptijd3auto5KM1 = session('looptijd3auto5KM1');
    $looptijd3auto5KM2 = session('looptijd3auto5KM2');
    $looptijd3auto5KM3 = session('looptijd3auto5KM3');

    $looptijd4auto5 = session('looptijd4auto5');
    $looptijd4auto5 = session('looptijd4auto5');
    $looptijd4auto5 = session('looptijd4auto5');
    $looptijd4auto5 = session('looptijd4auto5');
    $looptijd4auto5Tarief1 = session('looptijd4auto5Tarief1');
    $looptijd4auto5Tarief2 = session('looptijd4auto5Tarief2');
    $looptijd4auto5Tarief3 = session('looptijd4auto5Tarief3');
    $looptijd4auto5KM1 = session('looptijd4auto5KM1');
    $looptijd4auto5KM2 = session('looptijd4auto5KM2');
    $looptijd4auto5KM3 = session('looptijd4auto5KM3');

@endphp

<div id="page1" class="page" style="min-width: 210mm">
    <div class="logo-container">
        <img width="160px" style="margin-left: 15px; "
            src="https://www.blankertshortlease.nl/wp-content/uploads/2023/08/BLAN_Logo_Groen_V10.png" alt="">
        <div class="center">
            <p class="logo-text"><b>Shortlease-Offerte</b></p>
        </div>
        <div class="helper-phone">
            <p style="margin: 0px" class="helper-text"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                    <path
                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                </svg> 038 - 720 0880</p>
        </div>
    </div>
    <div class="center">
        <div id="offer-style" class="offer">
            @isset($auto1Id)
                <div class="offer-item">
                    <div class="container">
                        <div class="offer-title">
                            <h1 style="padding-top: 10px;">{{ $MerkAuto1 . ' ' . $TypeAuto1 . ' ' . $UitvoeringAuto1 }}
                            </h1>
                        </div>
                        <div class="offerte-img"> <img width="200px" style="border-radius: 10px;"
                                src="{{ $AfbeeldinggAuto1 }}" alt="">
                            <center><a href="{{ $URLgAuto1 }}/"><button class="offerte-btn"
                                        style="margin-right: 20px">Bekijk op de website</button></a>
                            </center>
                        </div>
                        <div class="offer-specs-layout">
                            <div class="specs-flex">
                                <div class="specs-item">
                                    <center>
                                        <p class="specs-tr">Brandstof</p>
                                        <p class="specs-td">{{ $BrandstofAuto1 }}</p>
                                    </center>
                                </div>
                                <div class="specs-item">
                                    <center>
                                        <p class="specs-tr">Transmissie</p>
                                        <p class="specs-td">{{ $TransmissieAuto1 }}</p>
                                </div>
                                <div class="specs-item">
                                    <center>
                                        <p class="specs-tr">Fiscale waarde</p>
                                        <p class="specs-td">€ {{ $FiscaleWaardeAuto1 }}</p>
                                </div>
                                <div class="specs-item">
                                    <center>
                                        <p class="specs-tr">Bijtelling</p>
                                        <p class="specs-td">{{ $BijtellingAuto1 }}</p>
                                </div>
                            </div>
                            <div class="tarieven-box">
                                @isset($looptijd1Auto1)
                                    <div class="tarieven">
                                        <p class="tarief-title">{{ $looptijd1Auto1 }} maand of langer</p>
                                        @isset($looptijd1Auto1Tarief1)
                                            <p class="tarief-value">€ {{ $looptijd1Auto1Tarief1 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd1Auto1Tarief1BTW = $looptijd1Auto1Tarief1 * 1.21;
                                                        $looptijd1Auto1Tarief1BTWRounded = number_format($looptijd1Auto1Tarief1BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd1Auto1Tarief1BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd1Auto1KM1 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd1Auto1KM112Mnd = $looptijd1Auto1KM1 * 12;
                                                    $looptijd1Auto1KM112MndRoundedTop = ceil($looptijd1Auto1KM112Mnd / 1000) * 1000;
                                                    $looptijd1Auto1KM112MndRounded = number_format($looptijd1Auto1KM112MndRoundedTop, 0, '.', '.');
                                                @endphp

                                                {{ $looptijd1Auto1KM112MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd1Auto1Tarief2)
                                            <p class="tarief-value"> € {{ $looptijd1Auto1Tarief2 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd1Auto1Tarief2BTW = $looptijd1Auto1Tarief2 * 1.21;
                                                        $looptijd1Auto1Tarief2BTWRounded = number_format($looptijd1Auto1Tarief2BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd1Auto1Tarief2BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd1Auto1KM2 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd1Auto1KM212Mnd = $looptijd1Auto1KM2 * 12;
                                                    $looptijd1Auto1KM212MndRoundedTop = ceil($looptijd1Auto1KM212Mnd / 1000) * 1000;
                                                    $looptijd1Auto1KM212MndRounded = number_format($looptijd1Auto1KM212MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd1Auto1KM212MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd1Auto1KM3)
                                            <p class="tarief-value"> € {{ $looptijd1Auto1Tarief3 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd1Auto1Tarief3BTW = $looptijd1Auto1Tarief3 * 1.21;
                                                        $looptijd1Auto1Tarief3BTWRounded = number_format($looptijd1Auto1Tarief3BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd1Auto1Tarief3BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd1Auto1KM3 }}km </b> per
                                                maand (

                                                @php
                                                    $looptijd1Auto1KM312Mnd = $looptijd1Auto1KM3 * 12;
                                                    $looptijd1Auto1KM312MndRoundedTop = ceil($looptijd1Auto1KM312Mnd / 1000) * 1000;
                                                    $looptijd1Auto1KM312MndRounded = number_format($looptijd1Auto1KM312MndRoundedTop, 0, '.', '.');
                                                @endphp

                                                {{ $looptijd1Auto1KM312MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                    </div>
                                @else
                                @endisset
                                @isset($looptijd2Auto1)
                                    <div class="tarieven">
                                        <p class="tarief-title">{{ $looptijd2Auto1 }} maand of langer</p>
                                        @isset($looptijd2Auto1Tarief1)
                                            <p class="tarief-value">€ {{ $looptijd2Auto1Tarief1 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd2Auto1Tarief1BTW = $looptijd2Auto1Tarief1 * 1.21;
                                                        $looptijd2Auto1Tarief1BTWRounded = number_format($looptijd2Auto1Tarief1BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd2Auto1Tarief1BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd2Auto1KM1 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd2Auto1KM112Mnd = $looptijd2Auto1KM1 * 12;
                                                    $looptijd2Auto1KM112MndRoundedTop = ceil($looptijd2Auto1KM112Mnd / 1000) * 1000;
                                                    $looptijd2Auto1KM112MndRounded = number_format($looptijd2Auto1KM112MndRoundedTop, 0, '.', '.');
                                                @endphp

                                                {{ $looptijd2Auto1KM112MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd2Auto1Tarief2)
                                            <p class="tarief-value"> € {{ $looptijd2Auto1Tarief2 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd2Auto1Tarief2BTW = $looptijd2Auto1Tarief2 * 1.21;
                                                        $looptijd2Auto1Tarief2BTWRounded = number_format($looptijd2Auto1Tarief2BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd2Auto1Tarief2BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd2Auto1KM2 }}km </b> per
                                                maand (

                                                @php
                                                    $looptijd2Auto1KM212Mnd = $looptijd2Auto1KM2 * 12;
                                                    $looptijd2Auto1KM212MndRoundedTop = ceil($looptijd2Auto1KM212Mnd / 1000) * 1000;
                                                    $looptijd2Auto1KM212MndRounded = number_format($looptijd2Auto1KM212MndRoundedTop, 0, '.', '.');
                                                @endphp

                                                {{ $looptijd2Auto1KM212MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd2Auto1KM3)
                                            <p class="tarief-value"> € {{ $looptijd2Auto1Tarief3 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd2Auto1Tarief3BTW = $looptijd2Auto1Tarief3 * 1.21;
                                                        $looptijd2Auto1Tarief3BTWRounded = number_format($looptijd2Auto1Tarief3BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd2Auto1Tarief3BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd2Auto1KM3 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd2Auto1KM312Mnd = $looptijd2Auto1KM3 * 12;
                                                    $looptijd2Auto1KM312MndRoundedTop = ceil($looptijd2Auto1KM312Mnd / 1000) * 1000;
                                                    $looptijd2Auto1KM312MndRounded = number_format($looptijd2Auto1KM312MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd2Auto1KM312MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                    </div>
                                @else
                                @endisset
                                @isset($looptijd3Auto1)
                                    <div class="tarieven">
                                        <p class="tarief-title">{{ $looptijd3Auto1 }} maand of langer</p>
                                        @isset($looptijd3Auto1Tarief1)
                                            <p class="tarief-value">€ {{ $looptijd3Auto1Tarief1 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd3Auto1Tarief1BTW = $looptijd3Auto1Tarief1 * 1.21;
                                                        $looptijd3Auto1Tarief1BTWRounded = number_format($looptijd3Auto1Tarief1BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd3Auto1Tarief1BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd3Auto1KM1 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd3Auto1KM112Mnd = $looptijd3Auto1KM1 * 12;
                                                    $looptijd3Auto1KM112MndRoundedTop = ceil($looptijd3Auto1KM112Mnd / 1000) * 1000;
                                                    $looptijd3Auto1KM112MndRounded = number_format($looptijd3Auto1KM112MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd3Auto1KM112MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd3Auto1Tarief2)
                                            <p class="tarief-value"> € {{ $looptijd3Auto1Tarief2 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd3Auto1Tarief2BTW = $looptijd3Auto1Tarief2 * 1.21;
                                                        $looptijd3Auto1Tarief2BTWRounded = number_format($looptijd3Auto1Tarief2BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd3Auto1Tarief2BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd3Auto1KM2 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd3Auto1KM212Mnd = $looptijd3Auto1KM2 * 12;
                                                    $looptijd3Auto1KM212MndRoundedTop = ceil($looptijd3Auto1KM212Mnd / 1000) * 1000;
                                                    $looptijd3Auto1KM212MndRounded = number_format($looptijd3Auto1KM212MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd3Auto1KM212MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd3Auto1KM3)
                                            <p class="tarief-value"> € {{ $looptijd3Auto1Tarief3 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd3Auto1Tarief3BTW = $looptijd3Auto1Tarief3 * 1.21;
                                                        $looptijd3Auto1Tarief3BTWRounded = number_format($looptijd3Auto1Tarief3BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd3Auto1Tarief3BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd3Auto1KM3 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd3Auto1KM312Mnd = $looptijd3Auto1KM3 * 12;
                                                    $looptijd3Auto1KM312MndRoundedTop = ceil($looptijd3Auto1KM312Mnd / 1000) * 1000;
                                                    $looptijd3Auto1KM312MndRounded = number_format($looptijd3Auto1KM312MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd3Auto1KM312MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                    </div>
                                @else
                                @endisset
                                @isset($looptijd4Auto1)
                                    <div class="tarieven">
                                        <p class="tarief-title">{{ $looptijd4Auto1 }} maand of langer</p>
                                        @isset($looptijd4Auto1Tarief1)
                                            <p class="tarief-value">€ {{ $looptijd4Auto1Tarief1 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd4Auto1Tarief1BTW = $looptijd4Auto1Tarief1 * 1.21;
                                                        $looptijd4Auto1Tarief1BTWRounded = number_format($looptijd4Auto1Tarief1BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd4Auto1Tarief1BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd4Auto1KM1 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd4Auto1KM112Mnd = $looptijd4Auto1KM1 * 12;
                                                    $looptijd4Auto1KM112MndRoundedTop = ceil($looptijd4Auto1KM112Mnd / 1000) * 1000;
                                                    $looptijd4Auto1KM112MndRounded = number_format($looptijd4Auto1KM112MndRoundedTop, 0, '.', '.');
                                                @endphp

                                                {{ $looptijd4Auto1KM112MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd4Auto1Tarief2)
                                            <p class="tarief-value"> € {{ $looptijd4Auto1Tarief2 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd4Auto1Tarief2BTW = $looptijd4Auto1Tarief2 * 1.21;
                                                        $looptijd4Auto1Tarief2BTWRounded = number_format($looptijd4Auto1Tarief2BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd4Auto1Tarief2BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd4Auto1KM2 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd4Auto1KM212Mnd = $looptijd4Auto1KM2 * 12;
                                                    $looptijd4Auto1KM212MndRoundedTop = ceil($looptijd4Auto1KM212Mnd / 1000) * 1000;
                                                    $looptijd4Auto1KM212MndRounded = number_format($looptijd4Auto1KM212MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd4Auto1KM212MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd4Auto1KM3)
                                            <p class="tarief-value"> € {{ $looptijd4Auto1Tarief3 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd4Auto1Tarief3BTW = $looptijd4Auto1Tarief3 * 1.21;
                                                        $looptijd4Auto1Tarief3BTWRounded = number_format($looptijd4Auto1Tarief3BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd4Auto1Tarief3BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd4Auto1KM3 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd4Auto1KM312Mnd = $looptijd4Auto1KM3 * 12;
                                                    $looptijd4Auto1KM312MndRoundedTop = ceil($looptijd4Auto1KM312Mnd / 1000) * 1000;
                                                    $looptijd4Auto1KM312MndRounded = number_format($looptijd4Auto1KM312MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd4Auto1KM312MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                    </div>
                                @else
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            @endisset
            @isset($auto2Id)
                <div class="offer-item">
                    <div class="container">
                        <div class="offer-title">
                            <h1 style="padding-top: 10px;">{{ $Merkauto2 . ' ' . $Typeauto2 . ' ' . $Uitvoeringauto2 }}
                            </h1>
                        </div>
                        <div class="offerte-img"> <img width="200px" style="border-radius: 10px;"
                                src="{{ $Afbeeldinggauto2 }}" alt="">
                            <center><a href="{{ $URLgauto2 }}/"><button class="offerte-btn"
                                        style="margin-right: 20px">Bekijk op de website</button></a>
                            </center>
                        </div>
                        <div class="offer-specs-layout">
                            <div class="specs-flex">
                                <div class="specs-item">
                                    <center>
                                        <p class="specs-tr">Brandstof</p>
                                        <p class="specs-td">{{ $Brandstofauto2 }}</p>
                                    </center>
                                </div>
                                <div class="specs-item">
                                    <center>
                                        <p class="specs-tr">Transmissie</p>
                                        <p class="specs-td">{{ $Transmissieauto2 }}</p>
                                </div>
                                <div class="specs-item">
                                    <center>
                                        <p class="specs-tr">Fiscale waarde</p>
                                        <p class="specs-td">€ {{ $FiscaleWaardeauto2 }}</p>
                                </div>
                                <div class="specs-item">
                                    <center>
                                        <p class="specs-tr">Bijtelling</p>
                                        <p class="specs-td">{{ $Bijtellingauto2 }}</p>
                                </div>
                            </div>
                            <div class="tarieven-box">
                                @isset($looptijd1auto2)
                                    <div class="tarieven">
                                        <p class="tarief-title">{{ $looptijd1auto2 }} maand of langer</p>
                                        @isset($looptijd1auto2Tarief1)
                                            <p class="tarief-value">€ {{ $looptijd1auto2Tarief1 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd1auto2Tarief1BTW = $looptijd1auto2Tarief1 * 1.21;
                                                        $looptijd1auto2Tarief1BTWRounded = number_format($looptijd1auto2Tarief1BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd1auto2Tarief1BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd1auto2KM1 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd1auto2KM112Mnd = $looptijd1auto2KM1 * 12;
                                                    $looptijd1auto2KM112MndRoundedTop = ceil($looptijd1auto2KM112Mnd / 1000) * 1000;
                                                    $looptijd1auto2KM112MndRounded = number_format($looptijd1auto2KM112MndRoundedTop, 0, '.', '.');
                                                @endphp

                                                {{ $looptijd1auto2KM112MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd1auto2Tarief2)
                                            <p class="tarief-value"> € {{ $looptijd1auto2Tarief2 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd1auto2Tarief2BTW = $looptijd1auto2Tarief2 * 1.21;
                                                        $looptijd1auto2Tarief2BTWRounded = number_format($looptijd1auto2Tarief2BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd1auto2Tarief2BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd1auto2KM2 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd1auto2KM212Mnd = $looptijd1auto2KM2 * 12;
                                                    $looptijd1auto2KM212MndRoundedTop = ceil($looptijd1auto2KM212Mnd / 1000) * 1000;
                                                    $looptijd1auto2KM212MndRounded = number_format($looptijd1auto2KM212MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd1auto2KM212MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd1auto2KM3)
                                            <p class="tarief-value"> € {{ $looptijd1auto2Tarief3 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd1auto2Tarief3BTW = $looptijd1auto2Tarief3 * 1.21;
                                                        $looptijd1auto2Tarief3BTWRounded = number_format($looptijd1auto2Tarief3BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd1auto2Tarief3BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd1auto2KM3 }}km </b> per
                                                maand (

                                                @php
                                                    $looptijd1auto2KM312Mnd = $looptijd1auto2KM3 * 12;
                                                    $looptijd1auto2KM312MndRoundedTop = ceil($looptijd1auto2KM312Mnd / 1000) * 1000;
                                                    $looptijd1auto2KM312MndRounded = number_format($looptijd1auto2KM312MndRoundedTop, 0, '.', '.');
                                                @endphp

                                                {{ $looptijd1auto2KM312MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                    </div>
                                @else
                                @endisset
                                @isset($looptijd2auto2)
                                    <div class="tarieven">
                                        <p class="tarief-title">{{ $looptijd2auto2 }} maand of langer</p>
                                        @isset($looptijd2auto2Tarief1)
                                            <p class="tarief-value">€ {{ $looptijd2auto2Tarief1 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd2auto2Tarief1BTW = $looptijd2auto2Tarief1 * 1.21;
                                                        $looptijd2auto2Tarief1BTWRounded = number_format($looptijd2auto2Tarief1BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd2auto2Tarief1BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd2auto2KM1 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd2auto2KM112Mnd = $looptijd2auto2KM1 * 12;
                                                    $looptijd2auto2KM112MndRoundedTop = ceil($looptijd2auto2KM112Mnd / 1000) * 1000;
                                                    $looptijd2auto2KM112MndRounded = number_format($looptijd2auto2KM112MndRoundedTop, 0, '.', '.');
                                                @endphp

                                                {{ $looptijd2auto2KM112MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd2auto2Tarief2)
                                            <p class="tarief-value"> € {{ $looptijd2auto2Tarief2 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd2auto2Tarief2BTW = $looptijd2auto2Tarief2 * 1.21;
                                                        $looptijd2auto2Tarief2BTWRounded = number_format($looptijd2auto2Tarief2BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd2auto2Tarief2BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd2auto2KM2 }}km </b> per
                                                maand (

                                                @php
                                                    $looptijd2auto2KM212Mnd = $looptijd2auto2KM2 * 12;
                                                    $looptijd2auto2KM212MndRoundedTop = ceil($looptijd2auto2KM212Mnd / 1000) * 1000;
                                                    $looptijd2auto2KM212MndRounded = number_format($looptijd2auto2KM212MndRoundedTop, 0, '.', '.');
                                                @endphp

                                                {{ $looptijd2auto2KM212MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd2auto2KM3)
                                            <p class="tarief-value"> € {{ $looptijd2auto2Tarief3 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd2auto2Tarief3BTW = $looptijd2auto2Tarief3 * 1.21;
                                                        $looptijd2auto2Tarief3BTWRounded = number_format($looptijd2auto2Tarief3BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd2auto2Tarief3BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd2auto2KM3 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd2auto2KM312Mnd = $looptijd2auto2KM3 * 12;
                                                    $looptijd2auto2KM312MndRoundedTop = ceil($looptijd2auto2KM312Mnd / 1000) * 1000;
                                                    $looptijd2auto2KM312MndRounded = number_format($looptijd2auto2KM312MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd2auto2KM312MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                    </div>
                                @else
                                @endisset
                                @isset($looptijd3auto2)
                                    <div class="tarieven">
                                        <p class="tarief-title">{{ $looptijd3auto2 }} maand of langer</p>
                                        @isset($looptijd3auto2Tarief1)
                                            <p class="tarief-value">€ {{ $looptijd3auto2Tarief1 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd3auto2Tarief1BTW = $looptijd3auto2Tarief1 * 1.21;
                                                        $looptijd3auto2Tarief1BTWRounded = number_format($looptijd3auto2Tarief1BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd3auto2Tarief1BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd3auto2KM1 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd3auto2KM112Mnd = $looptijd3auto2KM1 * 12;
                                                    $looptijd3auto2KM112MndRoundedTop = ceil($looptijd3auto2KM112Mnd / 1000) * 1000;
                                                    $looptijd3auto2KM112MndRounded = number_format($looptijd3auto2KM112MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd3auto2KM112MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd3auto2Tarief2)
                                            <p class="tarief-value"> € {{ $looptijd3auto2Tarief2 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd3auto2Tarief2BTW = $looptijd3auto2Tarief2 * 1.21;
                                                        $looptijd3auto2Tarief2BTWRounded = number_format($looptijd3auto2Tarief2BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd3auto2Tarief2BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd3auto2KM2 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd3auto2KM212Mnd = $looptijd3auto2KM2 * 12;
                                                    $looptijd3auto2KM212MndRoundedTop = ceil($looptijd3auto2KM212Mnd / 1000) * 1000;
                                                    $looptijd3auto2KM212MndRounded = number_format($looptijd3auto2KM212MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd3auto2KM212MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd3auto2KM3)
                                            <p class="tarief-value"> € {{ $looptijd3auto2Tarief3 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd3auto2Tarief3BTW = $looptijd3auto2Tarief3 * 1.21;
                                                        $looptijd3auto2Tarief3BTWRounded = number_format($looptijd3auto2Tarief3BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd3auto2Tarief3BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd3auto2KM3 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd3auto2KM312Mnd = $looptijd3auto2KM3 * 12;
                                                    $looptijd3auto2KM312MndRoundedTop = ceil($looptijd3auto2KM312Mnd / 1000) * 1000;
                                                    $looptijd3auto2KM312MndRounded = number_format($looptijd3auto2KM312MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd3auto2KM312MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                    </div>
                                @else
                                @endisset
                                @isset($looptijd4auto2)
                                    <div class="tarieven">
                                        <p class="tarief-title">{{ $looptijd4auto2 }} maand of langer</p>
                                        @isset($looptijd4auto2Tarief1)
                                            <p class="tarief-value">€ {{ $looptijd4auto2Tarief1 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd4auto2Tarief1BTW = $looptijd4auto2Tarief1 * 1.21;
                                                        $looptijd4auto2Tarief1BTWRounded = number_format($looptijd4auto2Tarief1BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd4auto2Tarief1BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd4auto2KM1 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd4auto2KM112Mnd = $looptijd4auto2KM1 * 12;
                                                    $looptijd4auto2KM112MndRoundedTop = ceil($looptijd4auto2KM112Mnd / 1000) * 1000;
                                                    $looptijd4auto2KM112MndRounded = number_format($looptijd4auto2KM112MndRoundedTop, 0, '.', '.');
                                                @endphp

                                                {{ $looptijd4auto2KM112MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd4auto2Tarief2)
                                            <p class="tarief-value"> € {{ $looptijd4auto2Tarief2 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd4auto2Tarief2BTW = $looptijd4auto2Tarief2 * 1.21;
                                                        $looptijd4auto2Tarief2BTWRounded = number_format($looptijd4auto2Tarief2BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd4auto2Tarief2BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd4auto2KM2 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd4auto2KM212Mnd = $looptijd4auto2KM2 * 12;
                                                    $looptijd4auto2KM212MndRoundedTop = ceil($looptijd4auto2KM212Mnd / 1000) * 1000;
                                                    $looptijd4auto2KM212MndRounded = number_format($looptijd4auto2KM212MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd4auto2KM212MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd4auto2KM3)
                                            <p class="tarief-value"> € {{ $looptijd4auto2Tarief3 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd4auto2Tarief3BTW = $looptijd4auto2Tarief3 * 1.21;
                                                        $looptijd4auto2Tarief3BTWRounded = number_format($looptijd4auto2Tarief3BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd4auto2Tarief3BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd4auto2KM3 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd4auto2KM312Mnd = $looptijd4auto2KM3 * 12;
                                                    $looptijd4auto2KM312MndRoundedTop = ceil($looptijd4auto2KM312Mnd / 1000) * 1000;
                                                    $looptijd4auto2KM312MndRounded = number_format($looptijd4auto2KM312MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd4auto2KM312MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                    </div>
                                @else
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            @endisset
            @isset($auto3Id)
                <div class="offer-item">
                    <div class="container">
                        <div class="offer-title">
                            <h1 style="padding-top: 10px;">{{ $Merkauto3 . ' ' . $Typeauto3 . ' ' . $Uitvoeringauto3 }}
                            </h1>
                        </div>
                        <div class="offerte-img"> <img width="200px" style="border-radius: 10px;"
                                src="{{ $Afbeeldinggauto3 }}" alt="">
                            <center><a href="{{ $URLgauto3 }}/"><button class="offerte-btn"
                                        style="margin-right: 20px">Bekijk op de website</button></a>
                            </center>
                        </div>
                        <div class="offer-specs-layout">
                            <div class="specs-flex">
                                <div class="specs-item">
                                    <center>
                                        <p class="specs-tr">Brandstof</p>
                                        <p class="specs-td">{{ $Brandstofauto3 }}</p>
                                    </center>
                                </div>
                                <div class="specs-item">
                                    <center>
                                        <p class="specs-tr">Transmissie</p>
                                        <p class="specs-td">{{ $Transmissieauto3 }}</p>
                                </div>
                                <div class="specs-item">
                                    <center>
                                        <p class="specs-tr">Fiscale waarde</p>
                                        <p class="specs-td">€ {{ $FiscaleWaardeauto3 }}</p>
                                </div>
                                <div class="specs-item">
                                    <center>
                                        <p class="specs-tr">Bijtelling</p>
                                        <p class="specs-td">{{ $Bijtellingauto3 }}</p>
                                </div>
                            </div>
                            <div class="tarieven-box">
                                @isset($looptijd1auto3)
                                    <div class="tarieven">
                                        <p class="tarief-title">{{ $looptijd1auto3 }} maand of langer</p>
                                        @isset($looptijd1auto3Tarief1)
                                            <p class="tarief-value">€ {{ $looptijd1auto3Tarief1 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd1auto3Tarief1BTW = $looptijd1auto3Tarief1 * 1.21;
                                                        $looptijd1auto3Tarief1BTWRounded = number_format($looptijd1auto3Tarief1BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd1auto3Tarief1BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd1auto3KM1 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd1auto3KM112Mnd = $looptijd1auto3KM1 * 12;
                                                    $looptijd1auto3KM112MndRoundedTop = ceil($looptijd1auto3KM112Mnd / 1000) * 1000;
                                                    $looptijd1auto3KM112MndRounded = number_format($looptijd1auto3KM112MndRoundedTop, 0, '.', '.');
                                                @endphp

                                                {{ $looptijd1auto3KM112MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd1auto3Tarief2)
                                            <p class="tarief-value"> € {{ $looptijd1auto3Tarief2 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd1auto3Tarief2BTW = $looptijd1auto3Tarief2 * 1.21;
                                                        $looptijd1auto3Tarief2BTWRounded = number_format($looptijd1auto3Tarief2BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd1auto3Tarief2BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd1auto3KM2 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd1auto3KM212Mnd = $looptijd1auto3KM2 * 12;
                                                    $looptijd1auto3KM212MndRoundedTop = ceil($looptijd1auto3KM212Mnd / 1000) * 1000;
                                                    $looptijd1auto3KM212MndRounded = number_format($looptijd1auto3KM212MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd1auto3KM212MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd1auto3KM3)
                                            <p class="tarief-value"> € {{ $looptijd1auto3Tarief3 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd1auto3Tarief3BTW = $looptijd1auto3Tarief3 * 1.21;
                                                        $looptijd1auto3Tarief3BTWRounded = number_format($looptijd1auto3Tarief3BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd1auto3Tarief3BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd1auto3KM3 }}km </b> per
                                                maand (

                                                @php
                                                    $looptijd1auto3KM312Mnd = $looptijd1auto3KM3 * 12;
                                                    $looptijd1auto3KM312MndRoundedTop = ceil($looptijd1auto3KM312Mnd / 1000) * 1000;
                                                    $looptijd1auto3KM312MndRounded = number_format($looptijd1auto3KM312MndRoundedTop, 0, '.', '.');
                                                @endphp

                                                {{ $looptijd1auto3KM312MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                    </div>
                                @else
                                @endisset
                                @isset($looptijd2auto3)
                                    <div class="tarieven">
                                        <p class="tarief-title">{{ $looptijd2auto3 }} maand of langer</p>
                                        @isset($looptijd2auto3Tarief1)
                                            <p class="tarief-value">€ {{ $looptijd2auto3Tarief1 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd2auto3Tarief1BTW = $looptijd2auto3Tarief1 * 1.21;
                                                        $looptijd2auto3Tarief1BTWRounded = number_format($looptijd2auto3Tarief1BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd2auto3Tarief1BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd2auto3KM1 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd2auto3KM112Mnd = $looptijd2auto3KM1 * 12;
                                                    $looptijd2auto3KM112MndRoundedTop = ceil($looptijd2auto3KM112Mnd / 1000) * 1000;
                                                    $looptijd2auto3KM112MndRounded = number_format($looptijd2auto3KM112MndRoundedTop, 0, '.', '.');
                                                @endphp

                                                {{ $looptijd2auto3KM112MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd2auto3Tarief2)
                                            <p class="tarief-value"> € {{ $looptijd2auto3Tarief2 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd2auto3Tarief2BTW = $looptijd2auto3Tarief2 * 1.21;
                                                        $looptijd2auto3Tarief2BTWRounded = number_format($looptijd2auto3Tarief2BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd2auto3Tarief2BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd2auto3KM2 }}km </b> per
                                                maand (

                                                @php
                                                    $looptijd2auto3KM212Mnd = $looptijd2auto3KM2 * 12;
                                                    $looptijd2auto3KM212MndRoundedTop = ceil($looptijd2auto3KM212Mnd / 1000) * 1000;
                                                    $looptijd2auto3KM212MndRounded = number_format($looptijd2auto3KM212MndRoundedTop, 0, '.', '.');
                                                @endphp

                                                {{ $looptijd2auto3KM212MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd2auto3KM3)
                                            <p class="tarief-value"> € {{ $looptijd2auto3Tarief3 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd2auto3Tarief3BTW = $looptijd2auto3Tarief3 * 1.21;
                                                        $looptijd2auto3Tarief3BTWRounded = number_format($looptijd2auto3Tarief3BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd2auto3Tarief3BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd2auto3KM3 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd2auto3KM312Mnd = $looptijd2auto3KM3 * 12;
                                                    $looptijd2auto3KM312MndRoundedTop = ceil($looptijd2auto3KM312Mnd / 1000) * 1000;
                                                    $looptijd2auto3KM312MndRounded = number_format($looptijd2auto3KM312MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd2auto3KM312MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                    </div>
                                @else
                                @endisset
                                @isset($looptijd3auto3)
                                    <div class="tarieven">
                                        <p class="tarief-title">{{ $looptijd3auto3 }} maand of langer</p>
                                        @isset($looptijd3auto3Tarief1)
                                            <p class="tarief-value">€ {{ $looptijd3auto3Tarief1 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd3auto3Tarief1BTW = $looptijd3auto3Tarief1 * 1.21;
                                                        $looptijd3auto3Tarief1BTWRounded = number_format($looptijd3auto3Tarief1BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd3auto3Tarief1BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd3auto3KM1 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd3auto3KM112Mnd = $looptijd3auto3KM1 * 12;
                                                    $looptijd3auto3KM112MndRoundedTop = ceil($looptijd3auto3KM112Mnd / 1000) * 1000;
                                                    $looptijd3auto3KM112MndRounded = number_format($looptijd3auto3KM112MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd3auto3KM112MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd3auto3Tarief2)
                                            <p class="tarief-value"> € {{ $looptijd3auto3Tarief2 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd3auto3Tarief2BTW = $looptijd3auto3Tarief2 * 1.21;
                                                        $looptijd3auto3Tarief2BTWRounded = number_format($looptijd3auto3Tarief2BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd3auto3Tarief2BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd3auto3KM2 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd3auto3KM212Mnd = $looptijd3auto3KM2 * 12;
                                                    $looptijd3auto3KM212MndRoundedTop = ceil($looptijd3auto3KM212Mnd / 1000) * 1000;
                                                    $looptijd3auto3KM212MndRounded = number_format($looptijd3auto3KM212MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd3auto3KM212MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd3auto3KM3)
                                            <p class="tarief-value"> € {{ $looptijd3auto3Tarief3 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd3auto3Tarief3BTW = $looptijd3auto3Tarief3 * 1.21;
                                                        $looptijd3auto3Tarief3BTWRounded = number_format($looptijd3auto3Tarief3BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd3auto3Tarief3BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd3auto3KM3 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd3auto3KM312Mnd = $looptijd3auto3KM3 * 12;
                                                    $looptijd3auto3KM312MndRoundedTop = ceil($looptijd3auto3KM312Mnd / 1000) * 1000;
                                                    $looptijd3auto3KM312MndRounded = number_format($looptijd3auto3KM312MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd3auto3KM312MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                    </div>
                                @else
                                @endisset
                                @isset($looptijd4auto3)
                                    <div class="tarieven">
                                        <p class="tarief-title">{{ $looptijd4auto3 }} maand of langer</p>
                                        @isset($looptijd4auto3Tarief1)
                                            <p class="tarief-value">€ {{ $looptijd4auto3Tarief1 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd4auto3Tarief1BTW = $looptijd4auto3Tarief1 * 1.21;
                                                        $looptijd4auto3Tarief1BTWRounded = number_format($looptijd4auto3Tarief1BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd4auto3Tarief1BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd4auto3KM1 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd4auto3KM112Mnd = $looptijd4auto3KM1 * 12;
                                                    $looptijd4auto3KM112MndRoundedTop = ceil($looptijd4auto3KM112Mnd / 1000) * 1000;
                                                    $looptijd4auto3KM112MndRounded = number_format($looptijd4auto3KM112MndRoundedTop, 0, '.', '.');
                                                @endphp

                                                {{ $looptijd4auto3KM112MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd4auto3Tarief2)
                                            <p class="tarief-value"> € {{ $looptijd4auto3Tarief2 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd4auto3Tarief2BTW = $looptijd4auto3Tarief2 * 1.21;
                                                        $looptijd4auto3Tarief2BTWRounded = number_format($looptijd4auto3Tarief2BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd4auto3Tarief2BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd4auto3KM2 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd4auto3KM212Mnd = $looptijd4auto3KM2 * 12;
                                                    $looptijd4auto3KM212MndRoundedTop = ceil($looptijd4auto3KM212Mnd / 1000) * 1000;
                                                    $looptijd4auto3KM212MndRounded = number_format($looptijd4auto3KM212MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd4auto3KM212MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                        @isset($looptijd4auto3KM3)
                                            <p class="tarief-value"> € {{ $looptijd4auto3Tarief3 }},-
                                                @isset($btw)
                                                    @php
                                                        $looptijd4auto3Tarief3BTW = $looptijd4auto3Tarief3 * 1.21;
                                                        $looptijd4auto3Tarief3BTWRounded = number_format($looptijd4auto3Tarief3BTW, 2, ',', '.');
                                                    @endphp
                                                    (€ {{ $looptijd4auto3Tarief3BTWRounded }} incl. BTW)
                                                @endisset
                                                o.b.v. <b>
                                                    {{ $looptijd4auto3KM3 }}km </b> per
                                                maand (
                                                @php
                                                    $looptijd4auto3KM312Mnd = $looptijd4auto3KM3 * 12;
                                                    $looptijd4auto3KM312MndRoundedTop = ceil($looptijd4auto3KM312Mnd / 1000) * 1000;
                                                    $looptijd4auto3KM312MndRounded = number_format($looptijd4auto3KM312MndRoundedTop, 0, '.', '.');
                                                @endphp
                                                {{ $looptijd4auto3KM312MndRounded }}km per jaar)</p>
                                        @else
                                        @endisset
                                    </div>
                                @else
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            @endisset

        </div>
    </div>
</div>


<div id="page2">
    <div id="page1-1" class="page">
        <div class="logo-container">
            <img width="150px" style="margin-left: 15px; "
                src="https://www.blankertshortlease.nl/wp-content/uploads/2023/08/BLAN_Logo_Groen_V10.png"
                alt="">
            <div class="center">
                <p class="logo-text"><b>Shortlease-Offerte</b></p>
            </div>
            <div class="helper-phone">
                <p style="margin: 0px" class="helper-text"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                        <path
                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                    </svg> 038 - 720 0880</p>
            </div>
        </div>
        <div class="center">
            <div id="offer-style2" class="offer2">
                <div class="relocate2"> </div>
                @isset($auto4Id)
                    <div class="offer-item">
                        <div class="container">
                            <div class="offer-title">
                                <h1 style="padding-top: 10px;">
                                    {{ $Merkauto4 . ' ' . $Typeauto4 . ' ' . $Uitvoeringauto4 }}
                                </h1>
                            </div>
                            <div class="offerte-img"> <img width="200px" style="border-radius: 10px;"
                                    src="{{ $Afbeeldinggauto4 }}" alt="">
                                <center><a href="{{ $URLgauto4 }}/"><button class="offerte-btn"
                                            style="margin-right: 20px">Bekijk op de website</button></a>
                                </center>
                            </div>
                            <div class="offer-specs-layout">
                                <div class="specs-flex">
                                    <div class="specs-item">
                                        <center>
                                            <p class="specs-tr">Brandstof</p>
                                            <p class="specs-td">{{ $Brandstofauto4 }}</p>
                                        </center>
                                    </div>
                                    <div class="specs-item">
                                        <center>
                                            <p class="specs-tr">Transmissie</p>
                                            <p class="specs-td">{{ $Transmissieauto4 }}</p>
                                    </div>
                                    <div class="specs-item">
                                        <center>
                                            <p class="specs-tr">Fiscale waarde</p>
                                            <p class="specs-td">€ {{ $FiscaleWaardeauto4 }}</p>
                                    </div>
                                    <div class="specs-item">
                                        <center>
                                            <p class="specs-tr">Bijtelling</p>
                                            <p class="specs-td">{{ $Bijtellingauto4 }}</p>
                                    </div>
                                </div>
                                <div class="tarieven-box">
                                    @isset($looptijd1auto4)
                                        <div class="tarieven">
                                            <p class="tarief-title">{{ $looptijd1auto4 }} maand of langer</p>
                                            @isset($looptijd1auto4Tarief1)
                                                <p class="tarief-value">€ {{ $looptijd1auto4Tarief1 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd1auto4Tarief1BTW = $looptijd1auto4Tarief1 * 1.21;
                                                            $looptijd1auto4Tarief1BTWRounded = number_format($looptijd1auto4Tarief1BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd1auto4Tarief1BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd1auto4KM1 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd1auto4KM112Mnd = $looptijd1auto4KM1 * 12;
                                                        $looptijd1auto4KM112MndRoundedTop = ceil($looptijd1auto4KM112Mnd / 1000) * 1000;
                                                        $looptijd1auto4KM112MndRounded = number_format($looptijd1auto4KM112MndRoundedTop, 0, '.', '.');
                                                    @endphp

                                                    {{ $looptijd1auto4KM112MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                            @isset($looptijd1auto4Tarief2)
                                                <p class="tarief-value"> € {{ $looptijd1auto4Tarief2 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd1auto4Tarief2BTW = $looptijd1auto4Tarief2 * 1.21;
                                                            $looptijd1auto4Tarief2BTWRounded = number_format($looptijd1auto4Tarief2BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd1auto4Tarief2BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd1auto4KM2 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd1auto4KM212Mnd = $looptijd1auto4KM2 * 12;
                                                        $looptijd1auto4KM212MndRoundedTop = ceil($looptijd1auto4KM212Mnd / 1000) * 1000;
                                                        $looptijd1auto4KM212MndRounded = number_format($looptijd1auto4KM212MndRoundedTop, 0, '.', '.');
                                                    @endphp
                                                    {{ $looptijd1auto4KM212MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                            @isset($looptijd1auto4KM3)
                                                <p class="tarief-value"> € {{ $looptijd1auto4Tarief3 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd1auto4Tarief3BTW = $looptijd1auto4Tarief3 * 1.21;
                                                            $looptijd1auto4Tarief3BTWRounded = number_format($looptijd1auto4Tarief3BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd1auto4Tarief3BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd1auto4KM3 }}km </b> per
                                                    maand (

                                                    @php
                                                        $looptijd1auto4KM312Mnd = $looptijd1auto4KM3 * 12;
                                                        $looptijd1auto4KM312MndRoundedTop = ceil($looptijd1auto4KM312Mnd / 1000) * 1000;
                                                        $looptijd1auto4KM312MndRounded = number_format($looptijd1auto4KM312MndRoundedTop, 0, '.', '.');
                                                    @endphp

                                                    {{ $looptijd1auto4KM312MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                        </div>
                                    @else
                                    @endisset
                                    @isset($looptijd2auto4)
                                        <div class="tarieven">
                                            <p class="tarief-title">{{ $looptijd2auto4 }} maand of langer</p>
                                            @isset($looptijd2auto4Tarief1)
                                                <p class="tarief-value">€ {{ $looptijd2auto4Tarief1 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd2auto4Tarief1BTW = $looptijd2auto4Tarief1 * 1.21;
                                                            $looptijd2auto4Tarief1BTWRounded = number_format($looptijd2auto4Tarief1BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd2auto4Tarief1BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd2auto4KM1 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd2auto4KM112Mnd = $looptijd2auto4KM1 * 12;
                                                        $looptijd2auto4KM112MndRoundedTop = ceil($looptijd2auto4KM112Mnd / 1000) * 1000;
                                                        $looptijd2auto4KM112MndRounded = number_format($looptijd2auto4KM112MndRoundedTop, 0, '.', '.');
                                                    @endphp

                                                    {{ $looptijd2auto4KM112MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                            @isset($looptijd2auto4Tarief2)
                                                <p class="tarief-value"> € {{ $looptijd2auto4Tarief2 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd2auto4Tarief2BTW = $looptijd2auto4Tarief2 * 1.21;
                                                            $looptijd2auto4Tarief2BTWRounded = number_format($looptijd2auto4Tarief2BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd2auto4Tarief2BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd2auto4KM2 }}km </b> per
                                                    maand (

                                                    @php
                                                        $looptijd2auto4KM212Mnd = $looptijd2auto4KM2 * 12;
                                                        $looptijd2auto4KM212MndRoundedTop = ceil($looptijd2auto4KM212Mnd / 1000) * 1000;
                                                        $looptijd2auto4KM212MndRounded = number_format($looptijd2auto4KM212MndRoundedTop, 0, '.', '.');
                                                    @endphp

                                                    {{ $looptijd2auto4KM212MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                            @isset($looptijd2auto4KM3)
                                                <p class="tarief-value"> € {{ $looptijd2auto4Tarief3 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd2auto4Tarief3BTW = $looptijd2auto4Tarief3 * 1.21;
                                                            $looptijd2auto4Tarief3BTWRounded = number_format($looptijd2auto4Tarief3BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd2auto4Tarief3BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd2auto4KM3 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd2auto4KM312Mnd = $looptijd2auto4KM3 * 12;
                                                        $looptijd2auto4KM312MndRoundedTop = ceil($looptijd2auto4KM312Mnd / 1000) * 1000;
                                                        $looptijd2auto4KM312MndRounded = number_format($looptijd2auto4KM312MndRoundedTop, 0, '.', '.');
                                                    @endphp
                                                    {{ $looptijd2auto4KM312MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                        </div>
                                    @else
                                    @endisset
                                    @isset($looptijd3auto4)
                                        <div class="tarieven">
                                            <p class="tarief-title">{{ $looptijd3auto4 }} maand of langer</p>
                                            @isset($looptijd3auto4Tarief1)
                                                <p class="tarief-value">€ {{ $looptijd3auto4Tarief1 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd3auto4Tarief1BTW = $looptijd3auto4Tarief1 * 1.21;
                                                            $looptijd3auto4Tarief1BTWRounded = number_format($looptijd3auto4Tarief1BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd3auto4Tarief1BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd3auto4KM1 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd3auto4KM112Mnd = $looptijd3auto4KM1 * 12;
                                                        $looptijd3auto4KM112MndRoundedTop = ceil($looptijd3auto4KM112Mnd / 1000) * 1000;
                                                        $looptijd3auto4KM112MndRounded = number_format($looptijd3auto4KM112MndRoundedTop, 0, '.', '.');
                                                    @endphp
                                                    {{ $looptijd3auto4KM112MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                            @isset($looptijd3auto4Tarief2)
                                                <p class="tarief-value"> € {{ $looptijd3auto4Tarief2 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd3auto4Tarief2BTW = $looptijd3auto4Tarief2 * 1.21;
                                                            $looptijd3auto4Tarief2BTWRounded = number_format($looptijd3auto4Tarief2BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd3auto4Tarief2BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd3auto4KM2 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd3auto4KM212Mnd = $looptijd3auto4KM2 * 12;
                                                        $looptijd3auto4KM212MndRoundedTop = ceil($looptijd3auto4KM212Mnd / 1000) * 1000;
                                                        $looptijd3auto4KM212MndRounded = number_format($looptijd3auto4KM212MndRoundedTop, 0, '.', '.');
                                                    @endphp
                                                    {{ $looptijd3auto4KM212MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                            @isset($looptijd3auto4KM3)
                                                <p class="tarief-value"> € {{ $looptijd3auto4Tarief3 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd3auto4Tarief3BTW = $looptijd3auto4Tarief3 * 1.21;
                                                            $looptijd3auto4Tarief3BTWRounded = number_format($looptijd3auto4Tarief3BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd3auto4Tarief3BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd3auto4KM3 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd3auto4KM312Mnd = $looptijd3auto4KM3 * 12;
                                                        $looptijd3auto4KM312MndRoundedTop = ceil($looptijd3auto4KM312Mnd / 1000) * 1000;
                                                        $looptijd3auto4KM312MndRounded = number_format($looptijd3auto4KM312MndRoundedTop, 0, '.', '.');
                                                    @endphp
                                                    {{ $looptijd3auto4KM312MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                        </div>
                                    @else
                                    @endisset
                                    @isset($looptijd4auto4)
                                        <div class="tarieven">
                                            <p class="tarief-title">{{ $looptijd4auto4 }} maand of langer</p>
                                            @isset($looptijd4auto4Tarief1)
                                                <p class="tarief-value">€ {{ $looptijd4auto4Tarief1 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd4auto4Tarief1BTW = $looptijd4auto4Tarief1 * 1.21;
                                                            $looptijd4auto4Tarief1BTWRounded = number_format($looptijd4auto4Tarief1BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd4auto4Tarief1BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd4auto4KM1 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd4auto4KM112Mnd = $looptijd4auto4KM1 * 12;
                                                        $looptijd4auto4KM112MndRoundedTop = ceil($looptijd4auto4KM112Mnd / 1000) * 1000;
                                                        $looptijd4auto4KM112MndRounded = number_format($looptijd4auto4KM112MndRoundedTop, 0, '.', '.');
                                                    @endphp

                                                    {{ $looptijd4auto4KM112MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                            @isset($looptijd4auto4Tarief2)
                                                <p class="tarief-value"> € {{ $looptijd4auto4Tarief2 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd4auto4Tarief2BTW = $looptijd4auto4Tarief2 * 1.21;
                                                            $looptijd4auto4Tarief2BTWRounded = number_format($looptijd4auto4Tarief2BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd4auto4Tarief2BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd4auto4KM2 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd4auto4KM212Mnd = $looptijd4auto4KM2 * 12;
                                                        $looptijd4auto4KM212MndRoundedTop = ceil($looptijd4auto4KM212Mnd / 1000) * 1000;
                                                        $looptijd4auto4KM212MndRounded = number_format($looptijd4auto4KM212MndRoundedTop, 0, '.', '.');
                                                    @endphp
                                                    {{ $looptijd4auto4KM212MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                            @isset($looptijd4auto4KM3)
                                                <p class="tarief-value"> € {{ $looptijd4auto4Tarief3 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd4auto4Tarief3BTW = $looptijd4auto4Tarief3 * 1.21;
                                                            $looptijd4auto4Tarief3BTWRounded = number_format($looptijd4auto4Tarief3BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd4auto4Tarief3BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd4auto4KM3 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd4auto4KM312Mnd = $looptijd4auto4KM3 * 12;
                                                        $looptijd4auto4KM312MndRoundedTop = ceil($looptijd4auto4KM312Mnd / 1000) * 1000;
                                                        $looptijd4auto4KM312MndRounded = number_format($looptijd4auto4KM312MndRoundedTop, 0, '.', '.');
                                                    @endphp
                                                    {{ $looptijd4auto4KM312MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                        </div>
                                    @else
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset
                @isset($auto5Id)
                    <div class="offer-item">
                        <div class="container">
                            <div class="offer-title">
                                <h1 style="padding-top: 10px;">
                                    {{ $Merkauto5 . ' ' . $Typeauto5 . ' ' . $Uitvoeringauto5 }}
                                </h1>
                            </div>
                            <div class="offerte-img"> <img width="200px" style="border-radius: 10px;"
                                    src="{{ $Afbeeldinggauto5 }}" alt="">
                                <center><a href="{{ $URLgauto5 }}/"><button class="offerte-btn"
                                            style="margin-right: 20px">Bekijk op de website</button></a>
                                </center>
                            </div>
                            <div class="offer-specs-layout">
                                <div class="specs-flex">
                                    <div class="specs-item">
                                        <center>
                                            <p class="specs-tr">Brandstof</p>
                                            <p class="specs-td">{{ $Brandstofauto5 }}</p>
                                        </center>
                                    </div>
                                    <div class="specs-item">
                                        <center>
                                            <p class="specs-tr">Transmissie</p>
                                            <p class="specs-td">{{ $Transmissieauto5 }}</p>
                                    </div>
                                    <div class="specs-item">
                                        <center>
                                            <p class="specs-tr">Fiscale waarde</p>
                                            <p class="specs-td">€ {{ $FiscaleWaardeauto5 }}</p>
                                    </div>
                                    <div class="specs-item">
                                        <center>
                                            <p class="specs-tr">Bijtelling</p>
                                            <p class="specs-td">{{ $Bijtellingauto5 }}</p>
                                    </div>
                                </div>
                                <div class="tarieven-box">
                                    @isset($looptijd1auto5)
                                        <div class="tarieven">
                                            <p class="tarief-title">{{ $looptijd1auto5 }} maand of langer</p>
                                            @isset($looptijd1auto5Tarief1)
                                                <p class="tarief-value">€ {{ $looptijd1auto5Tarief1 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd1auto5Tarief1BTW = $looptijd1auto5Tarief1 * 1.21;
                                                            $looptijd1auto5Tarief1BTWRounded = number_format($looptijd1auto5Tarief1BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd1auto5Tarief1BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd1auto5KM1 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd1auto5KM112Mnd = $looptijd1auto5KM1 * 12;
                                                        $looptijd1auto5KM112MndRoundedTop = ceil($looptijd1auto5KM112Mnd / 1000) * 1000;
                                                        $looptijd1auto5KM112MndRounded = number_format($looptijd1auto5KM112MndRoundedTop, 0, '.', '.');
                                                    @endphp

                                                    {{ $looptijd1auto5KM112MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                            @isset($looptijd1auto5Tarief2)
                                                <p class="tarief-value"> € {{ $looptijd1auto5Tarief2 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd1auto5Tarief2BTW = $looptijd1auto5Tarief2 * 1.21;
                                                            $looptijd1auto5Tarief2BTWRounded = number_format($looptijd1auto5Tarief2BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd1auto5Tarief2BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd1auto5KM2 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd1auto5KM212Mnd = $looptijd1auto5KM2 * 12;
                                                        $looptijd1auto5KM212MndRoundedTop = ceil($looptijd1auto5KM212Mnd / 1000) * 1000;
                                                        $looptijd1auto5KM212MndRounded = number_format($looptijd1auto5KM212MndRoundedTop, 0, '.', '.');
                                                    @endphp
                                                    {{ $looptijd1auto5KM212MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                            @isset($looptijd1auto5KM3)
                                                <p class="tarief-value"> € {{ $looptijd1auto5Tarief3 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd1auto5Tarief3BTW = $looptijd1auto5Tarief3 * 1.21;
                                                            $looptijd1auto5Tarief3BTWRounded = number_format($looptijd1auto5Tarief3BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd1auto5Tarief3BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd1auto5KM3 }}km </b> per
                                                    maand (

                                                    @php
                                                        $looptijd1auto5KM312Mnd = $looptijd1auto5KM3 * 12;
                                                        $looptijd1auto5KM312MndRoundedTop = ceil($looptijd1auto5KM312Mnd / 1000) * 1000;
                                                        $looptijd1auto5KM312MndRounded = number_format($looptijd1auto5KM312MndRoundedTop, 0, '.', '.');
                                                    @endphp

                                                    {{ $looptijd1auto5KM312MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                        </div>
                                    @else
                                    @endisset
                                    @isset($looptijd2auto5)
                                        <div class="tarieven">
                                            <p class="tarief-title">{{ $looptijd2auto5 }} maand of langer</p>
                                            @isset($looptijd2auto5Tarief1)
                                                <p class="tarief-value">€ {{ $looptijd2auto5Tarief1 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd2auto5Tarief1BTW = $looptijd2auto5Tarief1 * 1.21;
                                                            $looptijd2auto5Tarief1BTWRounded = number_format($looptijd2auto5Tarief1BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd2auto5Tarief1BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd2auto5KM1 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd2auto5KM112Mnd = $looptijd2auto5KM1 * 12;
                                                        $looptijd2auto5KM112MndRoundedTop = ceil($looptijd2auto5KM112Mnd / 1000) * 1000;
                                                        $looptijd2auto5KM112MndRounded = number_format($looptijd2auto5KM112MndRoundedTop, 0, '.', '.');
                                                    @endphp

                                                    {{ $looptijd2auto5KM112MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                            @isset($looptijd2auto5Tarief2)
                                                <p class="tarief-value"> € {{ $looptijd2auto5Tarief2 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd2auto5Tarief2BTW = $looptijd2auto5Tarief2 * 1.21;
                                                            $looptijd2auto5Tarief2BTWRounded = number_format($looptijd2auto5Tarief2BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd2auto5Tarief2BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd2auto5KM2 }}km </b> per
                                                    maand (

                                                    @php
                                                        $looptijd2auto5KM212Mnd = $looptijd2auto5KM2 * 12;
                                                        $looptijd2auto5KM212MndRoundedTop = ceil($looptijd2auto5KM212Mnd / 1000) * 1000;
                                                        $looptijd2auto5KM212MndRounded = number_format($looptijd2auto5KM212MndRoundedTop, 0, '.', '.');
                                                    @endphp

                                                    {{ $looptijd2auto5KM212MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                            @isset($looptijd2auto5KM3)
                                                <p class="tarief-value"> € {{ $looptijd2auto5Tarief3 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd2auto5Tarief3BTW = $looptijd2auto5Tarief3 * 1.21;
                                                            $looptijd2auto5Tarief3BTWRounded = number_format($looptijd2auto5Tarief3BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd2auto5Tarief3BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd2auto5KM3 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd2auto5KM312Mnd = $looptijd2auto5KM3 * 12;
                                                        $looptijd2auto5KM312MndRoundedTop = ceil($looptijd2auto5KM312Mnd / 1000) * 1000;
                                                        $looptijd2auto5KM312MndRounded = number_format($looptijd2auto5KM312MndRoundedTop, 0, '.', '.');
                                                    @endphp
                                                    {{ $looptijd2auto5KM312MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                        </div>
                                    @else
                                    @endisset
                                    @isset($looptijd3auto5)
                                        <div class="tarieven">
                                            <p class="tarief-title">{{ $looptijd3auto5 }} maand of langer</p>
                                            @isset($looptijd3auto5Tarief1)
                                                <p class="tarief-value">€ {{ $looptijd3auto5Tarief1 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd3auto5Tarief1BTW = $looptijd3auto5Tarief1 * 1.21;
                                                            $looptijd3auto5Tarief1BTWRounded = number_format($looptijd3auto5Tarief1BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd3auto5Tarief1BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd3auto5KM1 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd3auto5KM112Mnd = $looptijd3auto5KM1 * 12;
                                                        $looptijd3auto5KM112MndRoundedTop = ceil($looptijd3auto5KM112Mnd / 1000) * 1000;
                                                        $looptijd3auto5KM112MndRounded = number_format($looptijd3auto5KM112MndRoundedTop, 0, '.', '.');
                                                    @endphp
                                                    {{ $looptijd3auto5KM112MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                            @isset($looptijd3auto5Tarief2)
                                                <p class="tarief-value"> € {{ $looptijd3auto5Tarief2 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd3auto5Tarief2BTW = $looptijd3auto5Tarief2 * 1.21;
                                                            $looptijd3auto5Tarief2BTWRounded = number_format($looptijd3auto5Tarief2BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd3auto5Tarief2BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd3auto5KM2 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd3auto5KM212Mnd = $looptijd3auto5KM2 * 12;
                                                        $looptijd3auto5KM212MndRoundedTop = ceil($looptijd3auto5KM212Mnd / 1000) * 1000;
                                                        $looptijd3auto5KM212MndRounded = number_format($looptijd3auto5KM212MndRoundedTop, 0, '.', '.');
                                                    @endphp
                                                    {{ $looptijd3auto5KM212MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                            @isset($looptijd3auto5KM3)
                                                <p class="tarief-value"> € {{ $looptijd3auto5Tarief3 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd3auto5Tarief3BTW = $looptijd3auto5Tarief3 * 1.21;
                                                            $looptijd3auto5Tarief3BTWRounded = number_format($looptijd3auto5Tarief3BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd3auto5Tarief3BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd3auto5KM3 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd3auto5KM312Mnd = $looptijd3auto5KM3 * 12;
                                                        $looptijd3auto5KM312MndRoundedTop = ceil($looptijd3auto5KM312Mnd / 1000) * 1000;
                                                        $looptijd3auto5KM312MndRounded = number_format($looptijd3auto5KM312MndRoundedTop, 0, '.', '.');
                                                    @endphp
                                                    {{ $looptijd3auto5KM312MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                        </div>
                                    @else
                                    @endisset
                                    @isset($looptijd4auto5)
                                        <div class="tarieven">
                                            <p class="tarief-title">{{ $looptijd4auto5 }} maand of langer</p>
                                            @isset($looptijd4auto5Tarief1)
                                                <p class="tarief-value">€ {{ $looptijd4auto5Tarief1 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd4auto5Tarief1BTW = $looptijd4auto5Tarief1 * 1.21;
                                                            $looptijd4auto5Tarief1BTWRounded = number_format($looptijd4auto5Tarief1BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd4auto5Tarief1BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd4auto5KM1 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd4auto5KM112Mnd = $looptijd4auto5KM1 * 12;
                                                        $looptijd4auto5KM112MndRoundedTop = ceil($looptijd4auto5KM112Mnd / 1000) * 1000;
                                                        $looptijd4auto5KM112MndRounded = number_format($looptijd4auto5KM112MndRoundedTop, 0, '.', '.');
                                                    @endphp

                                                    {{ $looptijd4auto5KM112MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                            @isset($looptijd4auto5Tarief2)
                                                <p class="tarief-value"> € {{ $looptijd4auto5Tarief2 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd4auto5Tarief2BTW = $looptijd4auto5Tarief2 * 1.21;
                                                            $looptijd4auto5Tarief2BTWRounded = number_format($looptijd4auto5Tarief2BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd4auto5Tarief2BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd4auto5KM2 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd4auto5KM212Mnd = $looptijd4auto5KM2 * 12;
                                                        $looptijd4auto5KM212MndRoundedTop = ceil($looptijd4auto5KM212Mnd / 1000) * 1000;
                                                        $looptijd4auto5KM212MndRounded = number_format($looptijd4auto5KM212MndRoundedTop, 0, '.', '.');
                                                    @endphp
                                                    {{ $looptijd4auto5KM212MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                            @isset($looptijd4auto5KM3)
                                                <p class="tarief-value"> € {{ $looptijd4auto5Tarief3 }},-
                                                    @isset($btw)
                                                        @php
                                                            $looptijd4auto5Tarief3BTW = $looptijd4auto5Tarief3 * 1.21;
                                                            $looptijd4auto5Tarief3BTWRounded = number_format($looptijd4auto5Tarief3BTW, 2, ',', '.');
                                                        @endphp
                                                        (€ {{ $looptijd4auto5Tarief3BTWRounded }} incl. BTW)
                                                    @endisset
                                                    o.b.v. <b>
                                                        {{ $looptijd4auto5KM3 }}km </b> per
                                                    maand (
                                                    @php
                                                        $looptijd4auto5KM312Mnd = $looptijd4auto5KM3 * 12;
                                                        $looptijd4auto5KM312MndRoundedTop = ceil($looptijd4auto5KM312Mnd / 1000) * 1000;
                                                        $looptijd4auto5KM312MndRounded = number_format($looptijd4auto5KM312MndRoundedTop, 0, '.', '.');
                                                    @endphp
                                                    {{ $looptijd4auto5KM312MndRounded }}km per jaar)</p>
                                            @else
                                            @endisset
                                        </div>
                                    @else
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                {{-- <div class="offer-item">
                6
            </div> --}}

            </div>
        </div>

    </div>








</div>

<div id="page3">
    <div id="page1" class="page">
        <div class="logo-container">
            <img width="150px" style="margin-left: 15px; "
                src="https://www.blankertshortlease.nl/wp-content/uploads/2023/08/BLAN_Logo_Groen_V10.png"
                alt="">
            <div class="center">
                <p class="logo-text"><b>Shortlease-Offerte</b></p>
            </div>
            <div class="helper-phone">
                <p style="margin: 0px" class="helper-text"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                        <path
                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                    </svg> 038 - 720 0880</p>
            </div>
        </div>
        <div class="center">
            <div id="relocate3" class="offer2">

            </div>

        </div>
    </div>

</div>

<div id="pageAanvullend" class="page">
    <div class="logo-container">
        <img width="150px" style="margin-left: 15px; "
            src="https://www.blankertshortlease.nl/wp-content/uploads/2023/08/BLAN_Logo_Groen_V10.png"
            alt="">
        <div class="center">
            <p class="logo-text"><b>Aanvullende-Services</b></p>
        </div>
        <div class="helper-phone">
            <p style="margin: 0px" class="helper-text"> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                    <path
                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                </svg> 038 - 720 0880</p>
        </div>
    </div>
</div>

</div>

@php

@endphp
</body>

<script>

document.addEventListener("DOMContentLoaded", function() {
    const height = document.querySelector('#offer-style').offsetHeight;
    const height2 = document.querySelector('#offer-style2').offsetHeight;
    let numb = document.querySelector('#offer-style').children.length;
    page2 = document.getElementById('page2');
    page3 = document.getElementById('page3');

    console.log(height2);

    var element = document.querySelector('.offer');
    var element2 = document.querySelector('.offer2');
    var lastChildElement = element.lastElementChild;
    var lastChildElement2 = element2.lastElementChild;
    var previousElement = lastChildElement.previousElementSibling;
    var newParentElement = document.querySelector(".relocate2");
    var newParentElement2 = document.querySelector("#relocate3");
    if (element.offsetHeight < element.scrollHeight ||
        element.offsetWidth < element.scrollWidth) {
            if (height > "910"){ // grotte van de div is langer dan 1 pagina
                newParentElement.appendChild(lastChildElement);

            }
            else{
        // newParentElement.appendChild(twoElementsBeforeLastChild);
        // newParentElement.appendChild(previousElement);
        // newParentElement.appendChild(lastChildElement);
            }
    } else {
        // Het child element heeft geen overflow in het parent element
        // Behandel de situatie op de juiste manier
    }

    if (height < "905"){
        page2.classList.add("hidden");
    }else{

    }

    setTimeout(20);

    if (element2.offsetHeight < element2.scrollHeight ||
        element2.offsetWidth < element2.scrollWidth) {
            if (height2 > "810"){ // grotte van de div is langer dan 1 pagina
                newParentElement2.appendChild(lastChildElement2);
            }
            else{
            }
    } else {

        if (height2 <  "105"){ // grotte van de div is langer dan 1 pagina
            // page2.style.display = "none";



        }
        else{

        }

        if (height2 <  "910"){ // grotte van de div is langer dan 1 pagina

        }
        else{


        }

    }
});

    </script>
