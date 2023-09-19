<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/inscription', 'inscription');
// Route::post('/enregistrer', 'UserController')->name('user.getForm');
Route::post('/inscription', [UserController::class, 'getForm'])->name('user.getForm');

// Route::post('/enregistrer', 'UserController@getForm')->name('user.getForm');

