@extends('admin.admin')
@section('content')

    <?php date_default_timezone_set('Europe/Amsterdam');
    $h = date('G');
    if ($h >= 5 && $h <= 11) {
        $set = 'Goedemorgen ' . auth()->user()->name;
    } elseif ($h >= 12 && $h <= 15) {
        $set = 'Goedemiddag ' . auth()->user()->name;
    } else {
        $set = 'Ga naar huis ' . auth()->user()->name . '!';
    } ?>

    <body>

        @if (session()->has('statestiekMessage'))
            <div class="alert">
                <span id="lide-out-bottom" class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                {{ session()->get('statestiekMessage') }}
            </div>
        @endif

        <div class="header">
            <div class="header-left">
                <h2> {{ $set }}</h2>
            </div>
        </div>
        @if ($user->role == 2)
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="admin">
                <div class="admin-user-row1">

                    <?php $maandVorig = DB::table('statestieken')->value('maandVorig');
                    $bezettingsgraad = DB::table('statestieken')->value('bezetting');
                    $bezettingsgraadHuidigMaand = DB::table('statestieken')->value('bezettingsgraadHuidigMaand');
                    $bezettingsgraad2week = DB::table('statestieken')->value('bezettingsgraad2week');
                    $bezettingsgraadVorigeWeek = DB::table('statestieken')->value('bezettingsgraadVorigeWeek');
                    $bezettingsgraadHuidigWeek = DB::table('statestieken')->value('bezettingsgraadHuidigWeek');
                    $focus1 = DB::table('statestieken')->value('focus1');
                    $focus2 = DB::table('statestieken')->value('focus2');
                    $focus3 = DB::table('statestieken')->value('focus3');
                    $wagenpark = DB::table('statestieken')->value('aantalAuto');
                    $wagenpark2 = DB::table('statestieken')->value('wagenpark2'); ?>
                    <fieldset>
                        <legend>Bezettingsgraad</legend>
                        <div class="login">

                            <form action="{{ route('update-statestiek') }}" autocomplete="off" method="POST">
                                @csrf
                                <div class="center">
                                    <p> Gemiddeld over <select name="maandVorig">
                                            <option value="{{ $maandVorig }}"disabled selected>{{ $maandVorig }}
                                            </option>
                                            <option value="Januari">Januari</option>
                                            <option value="Februari">Februari</option>
                                            <option value="Maart">Maart</option>
                                            <option value="April">April</option>
                                            <option value="Mei">Mei</option>
                                            <option value="Juni">Juni</option>
                                            <option value="Juli">Juli</option>
                                            <option value="Augustus">Augustus</option>
                                            <option value="September">September</option>
                                            <option value="Oktober">Oktober</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select></p>
                                </div>
                                <div class="center"><input type="number" step=".01" name="bezettingsgraad"
                                        placeholder="{{ $bezettingsgraad }}%" id="bezettingsgraad"
                                        value="{{ old('bezettingsgraad') }}"></div>
                                <div class="center">
                                    <p>Gemiddeld huidige maand</p>
                                </div>
                                <input type="number" step=".01" name="bezettingsgraadHuidigMaand"
                                    placeholder="{{ $bezettingsgraadHuidigMaand }}%" id="bezettingsgraadHuidigMaand"
                                    value="{{ old('bezettingsgraadHuidigMaand') }}">
                                <br>
                                <hr>
                                <div class="center">
                                    <p>Huidige week</p>
                                </div>
                                <input type="number" step=".01" name="bezettingsgraadHuidigWeek"
                                    placeholder="{{ $bezettingsgraadHuidigWeek }}%" id="bezettingsgraadHuidigWeek"
                                    value="{{ old('bezettingsgraadHuidigWeek') }}">

                                <div class="center">
                                    <p>Vorige week</p>
                                </div>
                                <input type="number" step=".01" name="bezettingsgraadVorigeWeek"
                                    placeholder="{{ $bezettingsgraadVorigeWeek }}%" id="bezettingsgraadVorigeWeek"
                                    value="{{ old('bezettingsgraadVorigeWeek') }}">
                                <div class="center">
                                    <p>2 Weken geleden</p>
                                </div>
                                <input type="number" step=".01" name="bezettingsgraad2week"
                                    placeholder="{{ $bezettingsgraad2week }}%" id="bezettingsgraad2week"
                                    value="{{ old('bezettingsgraad2week') }}">
                                    <div class="center"><button type="submit" id="greenbtn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
                                            <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                          </svg>

                                        Update</button></div>
                            </form>


                        <br>
                        </form>
                </div>
                </fieldset>
                <fieldset>
                    <legend>Aantal Auto's</legend>
                    <div class="login">

                        <form action="{{ route('update-statestiek') }}" autocomplete="off" method="POST">
                            @csrf
                            <div class="center">
                                <p>Huidig</p>
                            </div>
                            <div class="center"><input type="number" name="aantalAuto" id="aantalAuto"
                                    placeholder="{{ $wagenpark }} auto's"></div>
                            <div class="center">
                                <p>Vorige week</p>
                            </div>
                            <div class="center"><input type="number" name="wagenpark2"
                                    placeholder="{{ $wagenpark2 }} auto's" id="wagenpark2"
                                    value="{{ old('wagenpark2') }}"></div>
                            <div class="center"><button type="submit" id="greenbtn">Update</button></div>
                        </form>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Auto's om op te focussen</legend>
                    <div class="login">

                        <form action="{{ route('update-focus') }}" autocomplete="off" method="POST">
                            @csrf
                            <div class="center">
                                <p>Huidig</p>
                            </div>
                            <div class="center"><input name="focus1" value="{{ $focus1 }}" id="focus1"></div>
                            <div class="center"><input name="focus2" value="{{ $focus2 }}" id="focus2"></div>
                            <div class="center"><input name="focus3" value="{{ $focus3 }}" id="focus3"></div>
                            <div class="center"><button type="submit" id="greenbtn">Update</button></div>
                        </form>
                    </div>
                </fieldset>
            </div>
            </div>
        @endif
    @endsection
