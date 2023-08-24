<html lang="en">

@extends('layout')

@section('content')

    <div class="flex">
        <div class="form-login">
            <div class="center">
                <img width="240px" style="margin-bottom: 25px; "
            src="https://www.blankertshortlease.nl/wp-content/uploads/2023/05/blankert-shortlease-autos-logo.png" alt="">
            </div>

            <div class="center">
                @if ($errors->any())
                    <h4 class="error">{{ $errors->first() }}</h4>
                @endif
            </div>
            <form method="POST">
                @csrf

                <div class="center"><input type="email" name="Email" value="{{ request()->old('Email') }}"
                        placeholder="Email" id="Email"></div>
                <div class="center"><input type="password" name="Password" placeholder="Wactwoord" id="Password"></div>

                <div class="center">
                    <button type="submit" name="Login" id="Login">Login</button>
                </div>
                <div class="center">
                    <p class="version"> Ontwikkeld door <a style="color: #ffbf00" href="https://wabtech-solutions.nl/" target="_blank" rel="noopener noreferrer"> Wabtech-Solutions</a> </p>
                </div>
            </form>

        </div>
    </div>
@stop
