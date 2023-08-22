<title>Hi {{ auth()->user()->name }} ✌️</title>
<link rel="stylesheet" href="/css/user.css">
<link rel="stylesheet" href="/css/slider.css">
<script src="/js/options.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<?php date_default_timezone_set('Europe/Amsterdam');
$h = date('G');
if ($h >= 5 && $h <= 11) {
    $set = 'Goedemorgen ' . auth()->user()->name;
} elseif ($h >= 12 && $h <= 18) {
    $set = 'Goedemiddag ' . auth()->user()->name;
} else {
    $set = 'Ga naar huis ' . auth()->user()->name . '!';
} ?>
@php
    $mail = 'Geachte';
    $maandVorig = DB::table('statestieken')->value('maandVorig');
    $bezettingsgraad = DB::table('statestieken')->value('bezetting');
    $bezettingsgraadHuidigMaand = DB::table('statestieken')->value('bezettingsgraadHuidigMaand');
    $bezettingsgraad2week = DB::table('statestieken')->value('bezettingsgraad2week');
    $bezettingsgraadVorigeWeek = DB::table('statestieken')->value('bezettingsgraadVorigeWeek');
    $bezettingsgraadHuidigWeek = DB::table('statestieken')->value('bezettingsgraadHuidigWeek');
    $focus1 = DB::table('statestieken')->value('focus1');
    $focus2 = DB::table('statestieken')->value('focus2');
    $focus3 = DB::table('statestieken')->value('focus3');
    $wagenpark = DB::table('statestieken')->value('aantalAuto');
    $wagenpark2 = DB::table('statestieken')->value('wagenpark2');
    $naam = session('naam');
    $email = session('email');
    $btw = session('btw');
    $geslacht = session('geslacht');
@endphp

@php
    $xml = file_get_contents('https://www.blankertshortlease.nl/feed-leasevergelijker.xml');
    $xmlData = simplexml_load_string($xml);
@endphp
@if ($naam == '')
    <?php
    // $popupclass = 'show';
    $popupclass = 'hidden';
    ?>
@else
    <?php
    $popupclass = 'hidden';
    ?>
@endif


@extends('layout')
@section('content')
    <div class="head-block">
        <div class="header">
            <div class="header-left">
                <h2> {{ $set }}</h2>
            </div>
            <div class="header-right"><a href="{{ url('/logout') }}"><button>Log uit</button></a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="hubspot">
            <div class="center">
            </div>
            <select style="width: 330px;" id="btw" name="btw">
                <option value="">Zakelijk</option>
                <option value="aan">Particulier</option>
            </select>
            <select style="width: 330px;" id="geslacht" name="geslacht">
                <option value="heer/mevrouw" disabled selected>Onbekend</option>
                <option value="heer">Man</option>
                <option value="mevrouw">Vrouw</option>
            </select>
            <input style="width: 330px;" type="text" placeholder="Naam" id="naam">
            <input style="width: 330px;" type="email" placeholder="Email" id="email">
            <select style="width: 330px;" id="gewenst" name="gewenst" required>
                <option value="" disabled selected hidden>Gewenste auto beschikbaar?</option>
                <option value="Nee">Nee</option>
                <option value="Ja">Ja</option>
            </select>

            <div class="center" style="border: 1px dotted red" >
                <button id="submit_button">Maak offerte</button>

                <a href="https://blankert.test/generate-pdf?download=true">Download PDF</a>
                <a href="https://blankert.test/generate-pdf?download=true"><button id="btn"
                        onclick="updateVar()">Mailto</button></a>
            </div>

            <div class="center">
                <button onclick="userAction()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-send-check-fill" viewBox="0 0 16 16">
                        <path
                            d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47L15.964.686Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                        <path
                            d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z" />
                    </svg>
                    Verstuur Offerte</button>
                </div><div class="center">
                <button onclick="userActionDownload()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0z"/>
                      </svg>
                    Alleen Downloaden</button>
            </div>
        </div>

        <div class="betamessage">
<p>Let op! Dit is een <b>Beta versie</b>! Ondervind je fouten?<a href="mailto:klanten@wabtech-solutions.nl?cc=willem@blankert.nl&subject=Bug%20melding%3A%20Blankert%20Shortlease%20Offerte-tool&body=Beste%20Willem%2C%0D%0A%0D%0AIk%20ondervindt%20een%20fout%20in%20de%20software.%0D%0A%0D%0A%5BBeschrijf%20fout%5D%0D%0A%0D%0AMet%20Vriendelijke%20groet%2C%0D%0A"> Meld ze hier.   </p>
</div></a>

        <div class="car">
            <div class="warpper">
                <input class="radio" id="one" name="group" type="radio" checked>
                <input class="radio" id="two" name="group" type="radio">
                <input class="radio" id="three" name="group" type="radio">
                <input class="radio" id="four" name="group" type="radio">
                <input class="radio" id="five" name="group" type="radio">
                <input class="radio" id="six" name="group" type="radio">

                <div class="tabs">
                    <label class="tab" id="one-tab" for="one">Auto <b>1</b></label>
                    <label class="tab" id="two-tab" for="two">Auto <b>2</b></label>
                    <label class="tab" id="three-tab" for="three">Auto <b>3</b></label>
                    <label class="tab" id="four-tab" for="four">Auto <b>4</b></label>
                    <label class="tab" id="five-tab" for="five">Auto <b>5</b></label>
                    <label class="tab" id="six-tab" for="six">Auto <b>6</b></label>
                </div>

                <div class="panels">
                    <div class="panel" id="one-panel">
                        <div class="carForm">
                            <div id="userinput" action="">



                                <label for="autoList">
                                </label>
                                <fieldset>
                                    <input style="width:90%" list="autoList" id="auto1Id" name="auto1" />

                                    <legend>Selecteer auto</legend>
                                    <datalist id="autoList">
                                        @foreach ($xmlData->post as $auto)
                                            <option value="{{ $auto->id }}">{{ $auto->Merk }} {{ $auto->Type }}
                                                {{ $auto->Uitvoering }}</option>
                                        @endforeach
                                    </datalist>
                                </fieldset>


                                <fieldset>
                                    <legend>Looptijd 1</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd1Auto1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd1Auto1Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1Auto1KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd1Auto1Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1Auto1KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd1Auto1Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1Auto1KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 2</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd2Auto1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd2Auto1Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2Auto1KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd2Auto1Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2Auto1KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd2Auto1Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2Auto1KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 3</legend>

                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd3Auto1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd3Auto1Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3Auto1KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd3Auto1Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3Auto1KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd3Auto1Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3Auto1KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 4</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd4Auto1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd4Auto1Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4Auto1KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd4Auto1Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4Auto1KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd4Auto1Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4Auto1KM3">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="panel" id="two-panel">
                        <div class="carForm">
                            <div id="userinput" action="">



                                <label for="autoList">
                                </label>
                                <fieldset>
                                    <input style="width:90%" list="autoList" id="auto2Id" name="Auto2" />

                                    <legend>Selecteer auto</legend>
                                    <datalist id="autoList">
                                        @foreach ($xmlData->post as $auto)
                                            <option value="{{ $auto->id }}">{{ $auto->Merk }} {{ $auto->Type }}
                                                {{ $auto->Uitvoering }}</option>
                                        @endforeach
                                    </datalist>
                                </fieldset>


                                <fieldset>
                                    <legend>Looptijd 1</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd1Auto2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd1Auto2Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1Auto2KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd1Auto2Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1Auto2KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd1Auto2Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1Auto2KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 2</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd2Auto2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd2Auto2Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2Auto2KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd2Auto2Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2Auto2KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd2Auto2Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2Auto2KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 3</legend>

                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd3Auto2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd3Auto2Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3Auto2KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd3Auto2Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3Auto2KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd3Auto2Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3Auto2KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 4</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd4Auto2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd4Auto2Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4Auto2KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd4Auto2Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4Auto2KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd4Auto2Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4Auto2KM3">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="panel" id="three-panel">
                        <div class="carForm">
                            <div id="userinput" action="">



                                <label for="autoList">
                                </label>
                                <fieldset>
                                    <input style="width:90%" list="autoList" id="auto3Id" name="auto3" />

                                    <legend>Selecteer auto</legend>
                                    <datalist id="autoList">
                                        @foreach ($xmlData->post as $auto)
                                            <option value="{{ $auto->id }}">{{ $auto->Merk }} {{ $auto->Type }}
                                                {{ $auto->Uitvoering }}</option>
                                        @endforeach
                                    </datalist>
                                </fieldset>


                                <fieldset>
                                    <legend>Looptijd 1</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd1auto3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd1auto3Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1auto3KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd1auto3Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1auto3KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd1auto3Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1auto3KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 2</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd2auto3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd2auto3Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2auto3KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd2auto3Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2auto3KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd2auto3Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2auto3KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 3</legend>

                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd3auto3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd3auto3Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3auto3KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd3auto3Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3auto3KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd3auto3Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3auto3KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 4</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd4auto3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd4auto3Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4auto3KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd4auto3Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4auto3KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd4auto3Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4auto3KM3">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="panel" id="four-panel">
                        <div class="carForm">
                            <div id="userinput" action="">



                                <label for="autoList">
                                </label>
                                <fieldset>
                                    <input style="width:90%" list="autoList" id="auto4Id" name="auto4" />

                                    <legend>Selecteer auto</legend>
                                    <datalist id="autoList">
                                        @foreach ($xmlData->post as $auto)
                                            <option value="{{ $auto->id }}">{{ $auto->Merk }} {{ $auto->Type }}
                                                {{ $auto->Uitvoering }}</option>
                                        @endforeach
                                    </datalist>
                                </fieldset>


                                <fieldset>
                                    <legend>Looptijd 1</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd1auto4">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd1auto4Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1auto4KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd1auto4Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1auto4KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd1auto4Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1auto4KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 2</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd2auto4">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd2auto4Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2auto4KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd2auto4Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2auto4KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd2auto4Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2auto4KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 3</legend>

                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd3auto4">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd3auto4Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3auto4KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd3auto4Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3auto4KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd3auto4Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3auto4KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 4</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd4auto4">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd4auto4Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4auto4KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd4auto4Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4auto4KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd4auto4Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4auto4KM3">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>


                    <div class="panel" id="five-panel">
                        <div class="carForm">
                            <div id="userinput" action="">



                                <label for="autoList">
                                </label>
                                <fieldset>
                                    <input style="width:90%" list="autoList" id="auto5Id" name="auto5" />

                                    <legend>Selecteer auto</legend>
                                    <datalist id="autoList">
                                        @foreach ($xmlData->post as $auto)
                                            <option value="{{ $auto->id }}">{{ $auto->Merk }} {{ $auto->Type }}
                                                {{ $auto->Uitvoering }}</option>
                                        @endforeach
                                    </datalist>
                                </fieldset>


                                <fieldset>
                                    <legend>Looptijd 1</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd1auto5">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd1auto5Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1auto5KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd1auto5Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1auto5KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd1auto5Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1auto5KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 2</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd2auto5">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd2auto5Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2auto5KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd2auto5Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2auto5KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd2auto5Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2auto5KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 3</legend>

                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd3auto5">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd3auto5Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3auto5KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd3auto5Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3auto5KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd3auto5Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3auto5KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 4</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd4auto5">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd4auto5Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4auto5KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd4auto5Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4auto5KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd4auto5Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4auto5KM3">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>


                    <div class="panel" id="six-panel">
                        <div class="carForm">
                            <div id="userinput" action="">



                                <label for="autoList">
                                </label>
                                <fieldset>
                                    <input style="width:90%" list="autoList" id="auto6Id" name="auto6" />

                                    <legend>Selecteer auto</legend>
                                    <datalist id="autoList">
                                        @foreach ($xmlData->post as $auto)
                                            <option value="{{ $auto->id }}">{{ $auto->Merk }} {{ $auto->Type }}
                                                {{ $auto->Uitvoering }}</option>
                                        @endforeach
                                    </datalist>
                                </fieldset>


                                <fieldset>
                                    <legend>Looptijd 1</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd1auto6">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd1auto6Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1auto6KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd1auto6Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1auto6KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd1auto6Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd1auto6KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 2</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd2auto6">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd2auto6Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2auto6KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd2auto6Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2auto6KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd2auto6Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd2auto6KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 3</legend>

                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd3auto6">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd3auto6Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3auto6KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd3auto6Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3auto6KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd3auto6Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd3auto6KM3">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Looptijd 4</legend>
                                    <div class="form-row">
                                        <input style="width: 120px; type="text" placeholder="looptijd"
                                            id="looptijd4auto6">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="€" type="text"
                                            id="looptijd4auto6Tarief1">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4auto6KM1">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd4auto6Tarief2">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4auto6KM2">
                                        <input style="width: 90px; margin: 10px 0 0 20px;" placeholder="€" type="text"
                                            id="looptijd4auto6Tarief3">
                                        <input style="width: 90px; margin: 10px 0 0 0;" placeholder="km" type="text"
                                            id="looptijd4auto6KM3">
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
        </div>
        <div class="offerte" >



        </div>
    </div>
@endsection


<script>
    $(document).ready(function() {
        $('#submit_button').click(function() {
            var btw = $('#btw').val();

            var auto1Id = $('#auto1Id').val();
            var looptijd1Auto1 = $('#looptijd1Auto1').val();
            var looptijd2Auto1 = $('#looptijd2Auto1').val();
            var looptijd3Auto1 = $('#looptijd3Auto1').val();
            var looptijd4Auto1 = $('#looptijd4Auto1').val();

            var looptijd1Auto1Tarief1 = $('#looptijd1Auto1Tarief1').val();
            var looptijd1Auto1Tarief2 = $('#looptijd1Auto1Tarief2').val();
            var looptijd1Auto1Tarief3 = $('#looptijd1Auto1Tarief3').val();
            var looptijd1Auto1KM1 = $('#looptijd1Auto1KM1').val();
            var looptijd1Auto1KM2 = $('#looptijd1Auto1KM2').val();
            var looptijd1Auto1KM3 = $('#looptijd1Auto1KM3').val();

            var looptijd2Auto1Tarief1 = $('#looptijd2Auto1Tarief1').val();
            var looptijd2Auto1Tarief2 = $('#looptijd2Auto1Tarief2').val();
            var looptijd2Auto1Tarief3 = $('#looptijd2Auto1Tarief3').val();
            var looptijd2Auto1KM1 = $('#looptijd2Auto1KM1').val();
            var looptijd2Auto1KM2 = $('#looptijd2Auto1KM2').val();
            var looptijd2Auto1KM3 = $('#looptijd2Auto1KM3').val();

            var looptijd3Auto1Tarief1 = $('#looptijd3Auto1Tarief1').val();
            var looptijd3Auto1Tarief2 = $('#looptijd3Auto1Tarief2').val();
            var looptijd3Auto1Tarief3 = $('#looptijd3Auto1Tarief3').val();
            var looptijd3Auto1KM1 = $('#looptijd3Auto1KM1').val();
            var looptijd3Auto1KM2 = $('#looptijd3Auto1KM2').val();
            var looptijd3Auto1KM3 = $('#looptijd3Auto1KM3').val();

            var looptijd4Auto1Tarief1 = $('#looptijd4Auto1Tarief1').val();
            var looptijd4Auto1Tarief2 = $('#looptijd4Auto1Tarief2').val();
            var looptijd4Auto1Tarief3 = $('#looptijd4Auto1Tarief3').val();
            var looptijd4Auto1KM1 = $('#looptijd4Auto1KM1').val();
            var looptijd4Auto1KM2 = $('#looptijd4Auto1KM2').val();
            var looptijd4Auto1KM3 = $('#looptijd4Auto1KM3').val();

            var auto2Id = $('#auto2Id').val();
            var looptijd1Auto2 = $('#looptijd1Auto2').val();
            var looptijd2Auto2 = $('#looptijd2Auto2').val();
            var looptijd3Auto2 = $('#looptijd3Auto2').val();
            var looptijd4Auto2 = $('#looptijd4Auto2').val();

            var looptijd1Auto2Tarief1 = $('#looptijd1Auto2Tarief1').val();
            var looptijd1Auto2Tarief2 = $('#looptijd1Auto2Tarief2').val();
            var looptijd1Auto2Tarief3 = $('#looptijd1Auto2Tarief3').val();
            var looptijd1Auto2KM1 = $('#looptijd1Auto2KM1').val();
            var looptijd1Auto2KM2 = $('#looptijd1Auto2KM2').val();
            var looptijd1Auto2KM3 = $('#looptijd1Auto2KM3').val();

            var looptijd2Auto2Tarief1 = $('#looptijd2Auto2Tarief1').val();
            var looptijd2Auto2Tarief2 = $('#looptijd2Auto2Tarief2').val();
            var looptijd2Auto2Tarief3 = $('#looptijd2Auto2Tarief3').val();
            var looptijd2Auto2KM1 = $('#looptijd2Auto2KM1').val();
            var looptijd2Auto2KM2 = $('#looptijd2Auto2KM2').val();
            var looptijd2Auto2KM3 = $('#looptijd2Auto2KM3').val();

            var looptijd3Auto2Tarief1 = $('#looptijd3Auto2Tarief1').val();
            var looptijd3Auto2Tarief2 = $('#looptijd3Auto2Tarief2').val();
            var looptijd3Auto2Tarief3 = $('#looptijd3Auto2Tarief3').val();
            var looptijd3Auto2KM1 = $('#looptijd3Auto2KM1').val();
            var looptijd3Auto2KM2 = $('#looptijd3Auto2KM2').val();
            var looptijd3Auto2KM3 = $('#looptijd3Auto2KM3').val();

            var looptijd4Auto2Tarief1 = $('#looptijd4Auto2Tarief1').val();
            var looptijd4Auto2Tarief2 = $('#looptijd4Auto2Tarief2').val();
            var looptijd4Auto2Tarief3 = $('#looptijd4Auto2Tarief3').val();
            var looptijd4Auto2KM1 = $('#looptijd4Auto2KM1').val();
            var looptijd4Auto2KM2 = $('#looptijd4Auto2KM2').val();
            var looptijd4Auto2KM3 = $('#looptijd4Auto2KM3').val();

            var auto3Id = $('#auto3Id').val();
            var looptijd1auto3 = $('#looptijd1auto3').val();
            var looptijd2auto3 = $('#looptijd2auto3').val();
            var looptijd3auto3 = $('#looptijd3auto3').val();
            var looptijd4auto3 = $('#looptijd4auto3').val();

            var looptijd1auto3Tarief1 = $('#looptijd1auto3Tarief1').val();
            var looptijd1auto3Tarief2 = $('#looptijd1auto3Tarief2').val();
            var looptijd1auto3Tarief3 = $('#looptijd1auto3Tarief3').val();
            var looptijd1auto3KM1 = $('#looptijd1auto3KM1').val();
            var looptijd1auto3KM2 = $('#looptijd1auto3KM2').val();
            var looptijd1auto3KM3 = $('#looptijd1auto3KM3').val();

            var looptijd2auto3Tarief1 = $('#looptijd2auto3Tarief1').val();
            var looptijd2auto3Tarief2 = $('#looptijd2auto3Tarief2').val();
            var looptijd2auto3Tarief3 = $('#looptijd2auto3Tarief3').val();
            var looptijd2auto3KM1 = $('#looptijd2auto3KM1').val();
            var looptijd2auto3KM2 = $('#looptijd2auto3KM2').val();
            var looptijd2auto3KM3 = $('#looptijd2auto3KM3').val();

            var looptijd3auto3Tarief1 = $('#looptijd3auto3Tarief1').val();
            var looptijd3auto3Tarief2 = $('#looptijd3auto3Tarief2').val();
            var looptijd3auto3Tarief3 = $('#looptijd3auto3Tarief3').val();
            var looptijd3auto3KM1 = $('#looptijd3auto3KM1').val();
            var looptijd3auto3KM2 = $('#looptijd3auto3KM2').val();
            var looptijd3auto3KM3 = $('#looptijd3auto3KM3').val();

            var looptijd4auto3Tarief1 = $('#looptijd4auto3Tarief1').val();
            var looptijd4auto3Tarief2 = $('#looptijd4auto3Tarief2').val();
            var looptijd4auto3Tarief3 = $('#looptijd4auto3Tarief3').val();
            var looptijd4auto3KM1 = $('#looptijd4auto3KM1').val();
            var looptijd4auto3KM2 = $('#looptijd4auto3KM2').val();
            var looptijd4auto3KM3 = $('#looptijd4auto3KM3').val();

            var auto4Id = $('#auto4Id').val();
            var looptijd1auto4 = $('#looptijd1auto4').val();
            var looptijd2auto4 = $('#looptijd2auto4').val();
            var looptijd3auto4 = $('#looptijd3auto4').val();
            var looptijd4auto4 = $('#looptijd4auto4').val();

            var looptijd1auto4Tarief1 = $('#looptijd1auto4Tarief1').val();
            var looptijd1auto4Tarief2 = $('#looptijd1auto4Tarief2').val();
            var looptijd1auto4Tarief3 = $('#looptijd1auto4Tarief3').val();
            var looptijd1auto4KM1 = $('#looptijd1auto4KM1').val();
            var looptijd1auto4KM2 = $('#looptijd1auto4KM2').val();
            var looptijd1auto4KM3 = $('#looptijd1auto4KM3').val();

            var looptijd2auto4Tarief1 = $('#looptijd2auto4Tarief1').val();
            var looptijd2auto4Tarief2 = $('#looptijd2auto4Tarief2').val();
            var looptijd2auto4Tarief3 = $('#looptijd2auto4Tarief3').val();
            var looptijd2auto4KM1 = $('#looptijd2auto4KM1').val();
            var looptijd2auto4KM2 = $('#looptijd2auto4KM2').val();
            var looptijd2auto4KM3 = $('#looptijd2auto4KM3').val();

            var looptijd3auto4Tarief1 = $('#looptijd3auto4Tarief1').val();
            var looptijd3auto4Tarief2 = $('#looptijd3auto4Tarief2').val();
            var looptijd3auto4Tarief3 = $('#looptijd3auto4Tarief3').val();
            var looptijd3auto4KM1 = $('#looptijd3auto4KM1').val();
            var looptijd3auto4KM2 = $('#looptijd3auto4KM2').val();
            var looptijd3auto4KM3 = $('#looptijd3auto4KM3').val();

            var looptijd4auto4Tarief1 = $('#looptijd4auto4Tarief1').val();
            var looptijd4auto4Tarief2 = $('#looptijd4auto4Tarief2').val();
            var looptijd4auto4Tarief3 = $('#looptijd4auto4Tarief3').val();
            var looptijd4auto4KM1 = $('#looptijd4auto4KM1').val();
            var looptijd4auto4KM2 = $('#looptijd4auto4KM2').val();
            var looptijd4auto4KM3 = $('#looptijd4auto4KM3').val();

            var auto5Id = $('#auto5Id').val();
            var looptijd1auto5 = $('#looptijd1auto5').val();
            var looptijd2auto5 = $('#looptijd2auto5').val();
            var looptijd3auto5 = $('#looptijd3auto5').val();
            var looptijd4auto5 = $('#looptijd4auto5').val();

            var looptijd1auto5Tarief1 = $('#looptijd1auto5Tarief1').val();
            var looptijd1auto5Tarief2 = $('#looptijd1auto5Tarief2').val();
            var looptijd1auto5Tarief3 = $('#looptijd1auto5Tarief3').val();
            var looptijd1auto5KM1 = $('#looptijd1auto5KM1').val();
            var looptijd1auto5KM2 = $('#looptijd1auto5KM2').val();
            var looptijd1auto5KM3 = $('#looptijd1auto5KM3').val();

            var looptijd2auto5Tarief1 = $('#looptijd2auto5Tarief1').val();
            var looptijd2auto5Tarief2 = $('#looptijd2auto5Tarief2').val();
            var looptijd2auto5Tarief3 = $('#looptijd2auto5Tarief3').val();
            var looptijd2auto5KM1 = $('#looptijd2auto5KM1').val();
            var looptijd2auto5KM2 = $('#looptijd2auto5KM2').val();
            var looptijd2auto5KM3 = $('#looptijd2auto5KM3').val();

            var looptijd3auto5Tarief1 = $('#looptijd3auto5Tarief1').val();
            var looptijd3auto5Tarief2 = $('#looptijd3auto5Tarief2').val();
            var looptijd3auto5Tarief3 = $('#looptijd3auto5Tarief3').val();
            var looptijd3auto5KM1 = $('#looptijd3auto5KM1').val();
            var looptijd3auto5KM2 = $('#looptijd3auto5KM2').val();
            var looptijd3auto5KM3 = $('#looptijd3auto5KM3').val();

            var looptijd4auto5Tarief1 = $('#looptijd4auto5Tarief1').val();
            var looptijd4auto5Tarief2 = $('#looptijd4auto5Tarief2').val();
            var looptijd4auto5Tarief3 = $('#looptijd4auto5Tarief3').val();
            var looptijd4auto5KM1 = $('#looptijd4auto5KM1').val();
            var looptijd4auto5KM2 = $('#looptijd4auto5KM2').val();
            var looptijd4auto5KM3 = $('#looptijd4auto5KM3').val();
            $.ajax({
                url: '/home',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'btw': btw,
                    'auto1Id': auto1Id,
                    'looptijd1Auto1': looptijd1Auto1,
                    'looptijd2Auto1': looptijd2Auto1,
                    'looptijd3Auto1': looptijd3Auto1,
                    'looptijd4Auto1': looptijd4Auto1,

                    'looptijd1Auto1Tarief1': looptijd1Auto1Tarief1,
                    'looptijd1Auto1Tarief2': looptijd1Auto1Tarief2,
                    'looptijd1Auto1Tarief3': looptijd1Auto1Tarief3,
                    'looptijd1Auto1KM1': looptijd1Auto1KM1,
                    'looptijd1Auto1KM2': looptijd1Auto1KM2,
                    'looptijd1Auto1KM3': looptijd1Auto1KM3,

                    'looptijd2Auto1Tarief1': looptijd2Auto1Tarief1,
                    'looptijd2Auto1Tarief2': looptijd2Auto1Tarief2,
                    'looptijd2Auto1Tarief3': looptijd2Auto1Tarief3,
                    'looptijd2Auto1KM1': looptijd2Auto1KM1,
                    'looptijd2Auto1KM2': looptijd2Auto1KM2,
                    'looptijd2Auto1KM3': looptijd2Auto1KM3,

                    'looptijd3Auto1Tarief1': looptijd3Auto1Tarief1,
                    'looptijd3Auto1Tarief2': looptijd3Auto1Tarief2,
                    'looptijd3Auto1Tarief3': looptijd3Auto1Tarief3,
                    'looptijd3Auto1KM1': looptijd3Auto1KM1,
                    'looptijd3Auto1KM2': looptijd3Auto1KM2,
                    'looptijd3Auto1KM3': looptijd3Auto1KM3,

                    'looptijd4Auto1Tarief1': looptijd4Auto1Tarief1,
                    'looptijd4Auto1Tarief2': looptijd4Auto1Tarief2,
                    'looptijd4Auto1Tarief3': looptijd4Auto1Tarief3,
                    'looptijd4Auto1KM1': looptijd4Auto1KM1,
                    'looptijd4Auto1KM2': looptijd4Auto1KM2,
                    'looptijd4Auto1KM3': looptijd4Auto1KM3,

                    'auto2Id': auto2Id,
                    'looptijd1Auto2': looptijd1Auto2,
                    'looptijd2Auto2': looptijd2Auto2,
                    'looptijd3Auto2': looptijd3Auto2,
                    'looptijd4Auto2': looptijd4Auto2,

                    'looptijd1Auto2Tarief1': looptijd1Auto2Tarief1,
                    'looptijd1Auto2Tarief2': looptijd1Auto2Tarief2,
                    'looptijd1Auto2Tarief3': looptijd1Auto2Tarief3,
                    'looptijd1Auto2KM1': looptijd1Auto2KM1,
                    'looptijd1Auto2KM2': looptijd1Auto2KM2,
                    'looptijd1Auto2KM3': looptijd1Auto2KM3,

                    'looptijd2Auto2Tarief1': looptijd2Auto2Tarief1,
                    'looptijd2Auto2Tarief2': looptijd2Auto2Tarief2,
                    'looptijd2Auto2Tarief3': looptijd2Auto2Tarief3,
                    'looptijd2Auto2KM1': looptijd2Auto2KM1,
                    'looptijd2Auto2KM2': looptijd2Auto2KM2,
                    'looptijd2Auto2KM3': looptijd2Auto2KM3,

                    'looptijd3Auto2Tarief1': looptijd3Auto2Tarief1,
                    'looptijd3Auto2Tarief2': looptijd3Auto2Tarief2,
                    'looptijd3Auto2Tarief3': looptijd3Auto2Tarief3,
                    'looptijd3Auto2KM1': looptijd3Auto2KM1,
                    'looptijd3Auto2KM2': looptijd3Auto2KM2,
                    'looptijd3Auto2KM3': looptijd3Auto2KM3,

                    'looptijd4Auto2Tarief1': looptijd4Auto2Tarief1,
                    'looptijd4Auto2Tarief2': looptijd4Auto2Tarief2,
                    'looptijd4Auto2Tarief3': looptijd4Auto2Tarief3,
                    'looptijd4Auto2KM1': looptijd4Auto2KM1,
                    'looptijd4Auto2KM2': looptijd4Auto2KM2,
                    'looptijd4Auto2KM3': looptijd4Auto2KM3,

                    'auto3Id': auto3Id,
                    'looptijd1auto3': looptijd1auto3,
                    'looptijd2auto3': looptijd2auto3,
                    'looptijd3auto3': looptijd3auto3,
                    'looptijd4auto3': looptijd4auto3,

                    'looptijd1auto3Tarief1': looptijd1auto3Tarief1,
                    'looptijd1auto3Tarief2': looptijd1auto3Tarief2,
                    'looptijd1auto3Tarief3': looptijd1auto3Tarief3,
                    'looptijd1auto3KM1': looptijd1auto3KM1,
                    'looptijd1auto3KM2': looptijd1auto3KM2,
                    'looptijd1auto3KM3': looptijd1auto3KM3,

                    'looptijd2auto3Tarief1': looptijd2auto3Tarief1,
                    'looptijd2auto3Tarief2': looptijd2auto3Tarief2,
                    'looptijd2auto3Tarief3': looptijd2auto3Tarief3,
                    'looptijd2auto3KM1': looptijd2auto3KM1,
                    'looptijd2auto3KM2': looptijd2auto3KM2,
                    'looptijd2auto3KM3': looptijd2auto3KM3,

                    'looptijd3auto3Tarief1': looptijd3auto3Tarief1,
                    'looptijd3auto3Tarief2': looptijd3auto3Tarief2,
                    'looptijd3auto3Tarief3': looptijd3auto3Tarief3,
                    'looptijd3auto3KM1': looptijd3auto3KM1,
                    'looptijd3auto3KM2': looptijd3auto3KM2,
                    'looptijd3auto3KM3': looptijd3auto3KM3,

                    'looptijd4auto3Tarief1': looptijd4auto3Tarief1,
                    'looptijd4auto3Tarief2': looptijd4auto3Tarief2,
                    'looptijd4auto3Tarief3': looptijd4auto3Tarief3,
                    'looptijd4auto3KM1': looptijd4auto3KM1,
                    'looptijd4auto3KM2': looptijd4auto3KM2,
                    'looptijd4auto3KM3': looptijd4auto3KM3,

                    'auto4Id': auto4Id,
                    'looptijd1auto4': looptijd1auto4,
                    'looptijd2auto4': looptijd2auto4,
                    'looptijd3auto4': looptijd3auto4,
                    'looptijd4auto4': looptijd4auto4,

                    'looptijd1auto4Tarief1': looptijd1auto4Tarief1,
                    'looptijd1auto4Tarief2': looptijd1auto4Tarief2,
                    'looptijd1auto4Tarief3': looptijd1auto4Tarief3,
                    'looptijd1auto4KM1': looptijd1auto4KM1,
                    'looptijd1auto4KM2': looptijd1auto4KM2,
                    'looptijd1auto4KM3': looptijd1auto4KM3,

                    'looptijd2auto4Tarief1': looptijd2auto4Tarief1,
                    'looptijd2auto4Tarief2': looptijd2auto4Tarief2,
                    'looptijd2auto4Tarief3': looptijd2auto4Tarief3,
                    'looptijd2auto4KM1': looptijd2auto4KM1,
                    'looptijd2auto4KM2': looptijd2auto4KM2,
                    'looptijd2auto4KM3': looptijd2auto4KM3,

                    'looptijd3auto4Tarief1': looptijd3auto4Tarief1,
                    'looptijd3auto4Tarief2': looptijd3auto4Tarief2,
                    'looptijd3auto4Tarief3': looptijd3auto4Tarief3,
                    'looptijd3auto4KM1': looptijd3auto4KM1,
                    'looptijd3auto4KM2': looptijd3auto4KM2,
                    'looptijd3auto4KM3': looptijd3auto4KM3,

                    'looptijd4auto4Tarief1': looptijd4auto4Tarief1,
                    'looptijd4auto4Tarief2': looptijd4auto4Tarief2,
                    'looptijd4auto4Tarief3': looptijd4auto4Tarief3,
                    'looptijd4auto4KM1': looptijd4auto4KM1,
                    'looptijd4auto4KM2': looptijd4auto4KM2,
                    'looptijd4auto4KM3': looptijd4auto4KM3,

                    'auto5Id': auto5Id,
                    'looptijd1auto5': looptijd1auto5,
                    'looptijd2auto5': looptijd2auto5,
                    'looptijd3auto5': looptijd3auto5,
                    'looptijd4auto5': looptijd4auto5,

                    'looptijd1auto5Tarief1': looptijd1auto5Tarief1,
                    'looptijd1auto5Tarief2': looptijd1auto5Tarief2,
                    'looptijd1auto5Tarief3': looptijd1auto5Tarief3,
                    'looptijd1auto5KM1': looptijd1auto5KM1,
                    'looptijd1auto5KM2': looptijd1auto5KM2,
                    'looptijd1auto5KM3': looptijd1auto5KM3,

                    'looptijd2auto5Tarief1': looptijd2auto5Tarief1,
                    'looptijd2auto5Tarief2': looptijd2auto5Tarief2,
                    'looptijd2auto5Tarief3': looptijd2auto5Tarief3,
                    'looptijd2auto5KM1': looptijd2auto5KM1,
                    'looptijd2auto5KM2': looptijd2auto5KM2,
                    'looptijd2auto5KM3': looptijd2auto5KM3,

                    'looptijd3auto5Tarief1': looptijd3auto5Tarief1,
                    'looptijd3auto5Tarief2': looptijd3auto5Tarief2,
                    'looptijd3auto5Tarief3': looptijd3auto5Tarief3,
                    'looptijd3auto5KM1': looptijd3auto5KM1,
                    'looptijd3auto5KM2': looptijd3auto5KM2,
                    'looptijd3auto5KM3': looptijd3auto5KM3,

                    'looptijd4auto5Tarief1': looptijd4auto5Tarief1,
                    'looptijd4auto5Tarief2': looptijd4auto5Tarief2,
                    'looptijd4auto5Tarief3': looptijd4auto5Tarief3,
                    'looptijd4auto5KM1': looptijd4auto5KM1,
                    'looptijd4auto5KM2': looptijd4auto5KM2,
                    'looptijd4auto5KM3': looptijd4auto5KM3,
                },
                success: function(response) {
                    if (response.success) {

                    }
                }
            });
        });
    });


    // Add a click event listener to the combined button
    function userAction() {
        // Perform the actions you want to execute when the combined button is clicked

        // Example: Submit the form
        document.getElementById('submit_button').click();

        updateVar();
        // Example: Download the PDF
        window.location.href = 'https://blankert.test/generate-pdf?download=true';

    }

    function userActionDownload() {
        // Perform the actions you want to execute when the combined button is clicked

        // Example: Submit the form
        document.getElementById('submit_button').click();

        // Example: Download the PDF
        setTimeout(() => {
            window.open('https://blankert.test/generate-pdf?download=true', '_blank');
        }, 1000);
        setTimeout(function() {
            location.reload();
        }, 4000);


    }


    function updateVar() {
        name = document.querySelector("#naam").value;
        geslacht = document.querySelector("#geslacht").value;
        email = document.querySelector("#email").value;
        download = "https://blankert.test/generate-pdf?download=true";
        const openLinkInNewTab = ('https://blankert.test/generate-pdf?download=true');

        if (gewenst.value == "Nee") {
            gew =
                '\nHelaas hebbebn we momenteel niet de gewenste auto beschikbaar, u vindt in de offerte een passend alternatief.';
        } else {
            gew = "";
        };

        if (btw.value == "") {
            sub = "Zakelijk";
        } else {
            sub = "Particulier";
        };
        subject = 'Blankert Shortlease: Offerte ' + sub;
        message = "Geachte " + geslacht + " " + name + "," +
            "\n \nHartelijk dank voor uw interesse in de diensten van Blankert Shortlease. Wij zijn verheugd om u een op maat gemaakete offerte aan te bieden. In de bijgevoegde offerte vindt u ons aanbod.\n" +
            gew +
            "\nHeeft u nog vragen of wens u een alternatief aanbod, dan staan wij altijd klaar om u te helpen. \n \n"

            ;

        var mailtoUrl = 'mailto:' + email + '?bcc=' + 'offerte@blankert.nl' + '&subject=' + encodeURIComponent(
            subject) + '&body=' + encodeURIComponent(message);


        window.open(mailtoUrl);

        setTimeout(() => {
            window.open('https://blankert.test/generate-pdf?download=true', '_blank');
        }, 1000);
        setTimeout(function() {
            location.reload();
        }, 4000);

    }
</script>
