<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SetLocaleController;


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

Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('/etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');
Route::get('/users',[UserController::class, 'index'])->name('user.index');
Route::get('/registration',[UserController::class, 'create'])->name('user.create');
Route::post('/registration',[UserController::class, 'store'])->name('user.store');

Route::middleware('auth')->group(function () {
    Route::get('/edit/etudiant/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
    Route::put('/edit/etudiant/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');
    Route::delete('/etudiant/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.delete');
});

// Article
Route::get('/articles', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::middleware('auth')->group(function () {
    Route::get('/create/article', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/create/article', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/edit/article/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/update/article/{article}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/delete/article/{article}', [ArticleController::class, 'destroy'])->name('article.delete');
});


// Document
Route::get('/documents', [DocumentController::class, 'index'])->name('document.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/create/document', [DocumentController::class, 'create'])->name('document.create');
    Route::post('/document', [DocumentController::class, 'store'])->name('document.store');
    Route::get('/edit/document/{id}', [DocumentController::class, 'edit'])->name('document.edit');
    Route::put('/document/{id}', [DocumentController::class, 'update'])->name('document.update');
    Route::delete('/document/{id}', [DocumentController::class, 'delete'])->name('document.delete');
});


// login
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

Route::get('/password/forgot', [UserController::class, 'forgot'])->name('user.forgot');
Route::post('/password/forgot', [UserController::class, 'email'])->name('user.email');
Route::get('/password/reset/{user}/{token}', [UserController::class, 'reset'])->name('user.reset');
Route::put('/password/reset/{user}/{token}', [UserController::class, 'resetUpdate'])->name('user.reset.update');





