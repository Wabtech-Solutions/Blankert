<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HubspotController;
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
    return view('login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);



//*********HUBSPOT CONTROLLER */
Route::get('/hubspot', [HubspotController::class, 'getDealById']);
Route::get('/hubspot/oauth2', [HubspotController::class, 'oauth2']);
Route::get('/hubspot/login', [HubspotController::class, 'login']);
Route::get('/aanvraag-zakelijk', function () {
    return Redirect::to('https://www.blankertshortlease.nl/wp-content/uploads/2023/08/Account-Aanvraagformulier-zakelijk.pdf');});

// Route::middleware(Authenticate::class)->group(function () {
//     Route::get('/', function () {
//         return view('welcome');
//     })->name('welcome');
    Route::get('/home', [AuthController::class, 'index'])->name('home');
    Route::get('/admin/statestieken', [AuthController::class, 'adminStat'])->name('admin.statestieken');
    Route::get('/admin/gebruikers', [AuthController::class, 'adminUserManage'])->name('admin.userManage');
    Route::get('/admin/gebruikers/toevoegen', [AuthController::class, 'adminUserAdd'])->name('admin.userAdd');
    Route::delete('/users/{user}', [AuthController::class, 'destroy'])->name('users.destroy');
    Route::post('/admin/gebruikers/toevoegen', [AuthController::class, 'register']);
    Route::post('/update-statestiek', [App\Http\Controllers\SatestiekController::class, 'update'])->name('update-statestiek');
    Route::post('/update-focus', [App\Http\Controllers\SatestiekController::class, 'updateFocus'])->name('update-focus');
    Route::post('/home', [App\Http\Controllers\ListController::class, 'store']);
    Route::get('/pdf', [App\Http\Controllers\ListController::class, 'show']);
    Route::get('/generate-pdf', [App\Http\Controllers\PdfGenerateController::class, 'pdfview'])->name('generate-pdf');
// });


Route::post('/', function (Illuminate\Http\Request $request) {

    // Verwerk de form input hier
    $naam = $request->input('naam');
    $email = $request->input('email');
    $btw = $request->input('btw');
    $geslacht = $request->input('geslacht');
    return back()->with('naam', $naam)->with('email', $email)->with('btw', $btw)->with('geslacht', $geslacht);
});

// Route::post('/home', [App\Http\Controllers\ListController::class, 'store']);
// Route::get('/pdf', [App\Http\Controllers\ListController::class, 'show']);

// Route::get('/generate-pdf', [App\Http\Controllers\PdfGenerateController::class, 'pdfview'])->name('generate-pdf');
