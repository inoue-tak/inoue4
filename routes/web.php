<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/timeline', 'TweetController@showTimelinePage')->name('timeline');
Route::post('/timeline', 'TweetController@postTweet');

Route::post('/timeline/delete/{id}', 'TweetController@destroy')->name('destroy');

Route::get('/user/show/{id}', 'UserController@show')->name('show');

// いいね
Route::get('/tweets/{tweet_id}/likes', 'LikeController@store');

// いいねを取り消す
Route::get('/likes/{like_id}', 'LikeController@destroy');