<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Redirect;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (!Auth::attempt(['email' => $request->Email, 'password' => $request->Password])) {
            return redirect()->route('login')->withErrors(['msg' => "Deze inlog-gegevens zijn onbekend. Vraag naar uw systembeheerder voor ondersteuning."]);
        }
        return redirect()->route('home');
    }

    public function register(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->Email;
        $user->password = bcrypt($request->Password);
        $user->role = $request->role;
        $user->save();
        return redirect()->back()->with('message', 'Gebruiker succesvol aangemaakt');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function index()
    {
        $users = User::all();
        $user = Auth::user();

        return View::make('home', ['users' => $users, 'user' => $user]);
    }

    public function adminStat()
    {
        $users = User::all();
        $user = Auth::user();

        return View::make('admin.statestieken', ['users' => $users, 'user' => $user]);
    }

    public function adminUserManage()
    {
        $users = User::all();
        $user = Auth::user();

        return View::make('admin.userManage', ['users' => $users, 'user' => $user]);
    }
    public function adminUserAdd()
    {
        $users = User::all();
        $user = Auth::user();

        return View::make('admin.userAdd', ['users' => $users, 'user' => $user]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.userManage')->with('deleteMessage', 'Gebruiker succesvol verwijderd!');
    }
}
