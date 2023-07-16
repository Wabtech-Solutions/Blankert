<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authenticate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return  view('login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(Authenticate::class)->group(function() {
    Route::get('/', function () {return view('welcome');})->name('welcome');
    Route::get('/home', function () {
        $user = Auth::user();
        return  view('home' , ['user' => $user]);
    })->name('home');
    Route::post('/home', [AuthController::class, 'register']);
});

