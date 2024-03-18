<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookmarkController;


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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/articles', ArticleController::class);
    Route::post('/articles/{article}/bookmark', [BookmarkController::class, 'store'])->name('bookmark.store');
    Route::delete('/articles/{article}/unbookmark', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
    Route::get('/bookmarks', [ArticleController::class, 'bookmark_articles'])->name('bookmarks');
});

Route::get('/articles', [ArticleController::class, 'index']) -> name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store']) -> name('articles.store');
Route::get('/articles/{article}', [ArticleController::class, 'show']) -> name('articles.show');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit']) -> name('articles.edit');
Route::patch('/articles/{article}', [ArticleController::class, 'update']) -> name('articles.update');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy']) -> name('articles.destroy');
