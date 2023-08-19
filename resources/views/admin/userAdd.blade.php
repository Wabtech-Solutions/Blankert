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

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="header">
        <div class="header-left">
            <h2> {{ $set }}</h2>
        </div>
    </div>

    <div class="admin">
        <div class="admin-user-row1">
            <fieldset>
                <legend>Gebruiker toevoegen</legend>
                <div class="login">
                    <form method="POST">
                        @csrf
                        <div class="center"><input type="name" name="name" placeholder="Naam" id="naam">
                        </div>
                        <div class="center"><input type="email" name="Email" value="{{ request()->old('Email') }}"
                                placeholder="Email" id="Email"></div>
                        <div class="center"><input type="password" name="Password" placeholder="Wactwoord" id="Password">
                        </div>
                        <div class="center"><select name="role" id="role">
                                <option value="1">Gebruiker</option>
                                <option value="2">Administrator</option>
                            </select></div>
                        <div class="center"><button type="submit" name="Login" id="greenbtn">Maak account
                                aan</button></div>
                    </form>
                </div>
            </fieldset>
        </div>
    </div>
@endsection
