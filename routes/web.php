<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'landingpage'])->name('homepage');
Route::get('/profile/ads', [App\Http\Controllers\UserPanelController::class, 'myAds'])->name('profile.ads');
Route::get('/profile/account', [App\Http\Controllers\UserPanelController::class, 'myAccount'])->name('profile.account');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/ad', 'App\Http\Controllers\AdController');

Route::post('/ad/comment', [App\Http\Controllers\CommentController::class, 'comment'])->name('comment');

Route::post('/ad/filter', [App\Http\Controllers\AdController::class, 'filter'])->name('filter');

Route::post('/ad/favorite', [App\Http\Controllers\FavoriteAdController::class, 'favorite'])->name('ad.favorite');

Route::get('/ad/favorite/list', [App\Http\Controllers\FavoriteAdController::class, 'index'])->name('favorite.list');

Route::get('/models/get_by_manufacturer', [App\Http\Controllers\ModelController::class, 'get_by_manufacturer'])->name('models.get_by_manufacturer');

Route::get('/comments/get_by_ad', [App\Http\Controllers\CommentController::class, 'get_by_ad'])->name('comments.get_by_ad');

Route::get('/messages/chatlist', [App\Http\Controllers\MessageController::class, 'index'])->name('message.index');

Route::get('/messages/show/{id}', [App\Http\Controllers\MessageController::class, 'show'])->name('message.show');

Route::post('/messages/store', [App\Http\Controllers\MessageController::class, 'store'])->name('message.send');
