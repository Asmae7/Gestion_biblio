<?php

use App\Http\Controllers\AuteurController;
use App\Http\Controllers\LivreController;
use Illuminate\Support\Facades\Route;

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
Route::resource('livres', LivreController::class);
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmpruntsController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');


Route::get('/livres/{livre}/confirm', [LivreController::class, 'confirmDelete'])->name('livres.confirm');
Route::resource('auteur',AuteurController::class);
Route::get('/auteurs', [AuteurController::class, 'index'])->name('auteurs.index');
Route::resource('emprunts',EmpruntsController::class);
Route::get('/search', [EmpruntsController::class, 'search'])->name('search');







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('profile/create',[ProfileController::class,'create'])
->name('create');
Route::post('profile/store',[ProfileController::class,'store'])
->name('store');

Route::get('/login',[LogController::class,'show'])->name('login.show');

Route::post('/login',[LogController::class,'login'])->name('login');
Route::get('/logout', [LogController::class, 'logout'])->name('logout');

Route::get('/emprunts/search', 'EmpruntsController@search')->name('emprunts.search');
