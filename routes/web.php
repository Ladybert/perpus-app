<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
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

//user controller
Route::get('/dashboard', [UserController::class, 'index'])->name('user.dahboard');

// Books Routing
// Route::get('/publisher', [PublisherController::class, 'index']);
// Route::get('/dashboard',[BooksController::class, 'index'])->name('book.index')->middleware(['auth', 'verified']);
// Route::get('/dashboard/create-book',[BooksController::class, 'create'])->name('book.create');
Route::resource('dashboard', BooksController::class)->middleware(['auth', 'verified']);
// Route::get('/data/search', [BooksController::class, 'search'])->name('search');

// Publisher Routing
// Route::get('/dashboard/create-publisher',[PublisherController::class, 'create'])->name('publisher.create')->middleware(['auth', 'verified']);
// Route::get('/dashboard/{id}/edit-publisher',[PublisherController::class, 'edit'])->name('publisher.edit')->middleware(['auth', 'verified']);
// Route::put('/dashboard/{id}',[PublisherController::class, 'update'])->name('publisher.update');
// Route::delete('/dashboard/{id}',[PublisherController::class, 'destroy'])->name('publisher.delete');
// Route::post('/dashboard',[PublisherController::class, 'store'])->name('publisher.store');
Route::resource('publisher', PublisherController::class)->middleware(['auth', 'verified']);

// Author Routing
// Route::get('/dashboard/create-author',[AuthorsController::class, 'create'])->name('author.create')->middleware(['auth', 'verified']);
// Route::get('/dashboard/{id}/edit-author',[AuthorsController::class, 'edit'])->name('author.edit')->middleware(['auth', 'verified']);
// Route::put('/dashboard/{id}',[AuthorsController::class, 'update'])->name('author.update');
// Route::delete('/dashboard/{id}',[AuthorsController::class, 'destroy'])->name('author.delete');
// Route::post('/dashboard',[AuthorsController::class, 'store'])->name('author.store');
Route::resource('author', AuthorsController::class)->middleware(['auth', 'verified']);

// searchRoute
// Route::get('/data/search', [SearchController::class, 'search'])->name('search');

Route::get('/data', function() {
    return view('devlay.data');
})->middleware(['auth', 'verified'])->name('devlay.data');

// Route::get('/dashboard', function () {
//     return view('devlay.default');
// })->middleware(['auth', 'verified'])->name('devlay.default');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
