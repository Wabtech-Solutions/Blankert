<html lang="en">

@extends('layout')

@section('content')
    <div class="form-login">
        <div class="center">
            <h2>Log in</h2>
            </div>
        <div class="center">
            @if ($errors->any())
                <h4 class="error">{{ $errors->first() }}</h4>
            @endif
        </div>
        <form method="POST">
            @csrf

            <div class="center"><input type="email" name="Email" value="{{ request()->old('Email') }}" placeholder="Email"
                    id="Email"></div>
            <div class="center"><input type="password" name="Password" placeholder="Wactwoord" id="Password"></div>

            <div class="center">
                <button type="submit" name="Login" id="Login">Login</button>
            </div>
        </form>

    </div>

@stop
