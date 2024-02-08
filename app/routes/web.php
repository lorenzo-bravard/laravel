<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PwdController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PageController;


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

Route::get('/', [  
    PageController::class, 'web'
])->name('/');

Route::get('/login', [  
    PageController::class, 'login'
])->name('login');

Route::get('/dashboard', [
    PageController::class, 'dashboard'
])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/edit', [  
    PageController::class, 'editPwd'
])->name('edit');

Route::get('/addTeam', [
    PageController::class, 'addTeam'
])->name('addTeam');

Route::get('/team', [
    PageController::class, 'team'
])->name('team');

Route::get('/form', [
    PageController::class, 'form'
])->name('form');

Route::get('/list', [
    PageController::class, 'list'
])->name('list');


Route::get('/list', [
    ListController::class, 'getInfo'
])->name('ListController');


Route::post('/PwdCtrl', [
    PwdController::class, 'form'
])->name('PwdCtrl');

Route::post('/TeamController', [
    TeamController::class, 'formTeam'
])->name('TeamController');


Route::post('/editPwd', [
    PwdController::class, 'editPassword'
])->name('editPwd');

Route::post('/ajoutUser', [
    TeamController::class, 'formAddUser'
])->name('ajoutUser');

Route::post('/keepTeam', [
    TeamController::class, 'teamMemory'
])->name('keepTeam');


