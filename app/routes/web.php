<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PwdController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\TeamController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/form', function () {
    return view('form');
});

Route::get('/edit', function () {
    return view('editPwd');
});

Route::get('/addTeam', function () {
    return view('addTeam');
});

Route::get('/team', function () {
    return view('team');
});


Route::get('/form', function () {
    return view('form');
});


Route::get('/list', function () {
    return view('list');
});

Route::get('/list', [
    ListController::class, 'getInfo'
])->name('ListController');


Route::post('/PwdCtrl', [
    PwdController::class, 'form'
])->name('PwdCtrl');

Route::post('/TeamController', [
    TeamController::class, 'formTeam'
])->name('TeamController');


Route::post('/PwdController', [
    PwdController::class, 'editPassword'
])->name('PwdController');

Route::post('/ajoutUser', [
    TeamController::class, 'formAddUser'
])->name('ajoutUser');

Route::post('/keepTeam', [
    TeamController::class, 'teamMemory'
])->name('keepTeam');


