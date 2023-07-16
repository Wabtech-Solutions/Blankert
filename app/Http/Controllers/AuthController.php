<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        if (!Auth::attempt(['email' => $request->Email, 'password' => $request->Password]))
        {
            return redirect()->route('login')->withErrors(['msg' => "Deze inlog-gegevens zijn onbekend. Vraag naar uw systembeheerder voor ondersteuning"]);
        }
        return redirect()->route('home');
    }

    public function register(Request $request) {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->Email;
        $user->password = bcrypt($request->Password);
        $user->role = $request->role;
        $user->save();
        return redirect()->back()->with('message', 'Gebruiker succesvol aangemaakt');

    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login');
    }

}

