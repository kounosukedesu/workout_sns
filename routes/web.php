<?php

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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', 'PostController@index');
    Route::post('/posts', 'PostController@store');
    Route::get('/posts/create', 'PostController@create');
    Route::get('/posts/profile', 'PostController@profile');
    Route::get('/posts/jsonprofile', 'PostController@json_profile');
    Route::get('/posts/{post}', 'PostController@show');
    Route::post('/show', 'ReplyController@store');
    Route::post('/show/reply', 'ReplyController@toReplyStore');
    Route::delete('/posts/{post}', 'PostController@delete');
    Route::get('/posts/like/{id}', 'PostController@like')->name('post.like');
    Route::get('/posts/unlike/{id}', 'PostController@unlike')->name('post.unlike');
    Route::get('/categories/{workout}', 'WorkoutController@index');
    Route::post('/users/follow/{user}', 'FollowUserController@store')->name('FollowUser.follow');
    Route::post('/users/unfollow/{user}', 'FollowUserController@destroy')->name('FollowUser.unfollow');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
