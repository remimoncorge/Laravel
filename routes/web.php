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
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/articles', 'ArticlesController@index');
Route::get('/contact', 'ContactController@index');
Route::get('/article/{post_name}', 'ArticlesController@show');
Route::post('/contact', 'ContactController@save')->name('contact.store');
Route::post('/newsletters/new', 'NewslettersController@save')->name('newsletters.new');

Route::get('/login/google', 'Auth\LoginController@redirectGoogleToProvider');
Route::get('/login/google/callback', 'Auth\LoginController@handleProviderGoogleCallback');

Route::get('/login/github', 'Auth\LoginController@redirectGithubToProvider');
Route::get('/login/github/callback', 'Auth\LoginController@handleProviderGithubCallback');

Route::group(['middleware'=>['auth']], function (){

    Route::get('/profile', 'UserController@index')->name('user');
    Route::get('/nopermission', 'HomeController@permissionDenied')->name('nopermission');

    Route::get('/create', 'ArticlesController@create');
    Route::post('/create', 'ArticlesController@save')->name('article.new');

    Route::put('/update/{id}', 'ArticlesController@update')->name('article.update');

    Route::get('/article/edit/{id}', 'ArticlesController@edit')->name('article.edit');
    Route::patch('/article/edit/{id}', 'ArticlesController@edit')->name('article.edit');

    Route::delete('/article/{id}', 'ArticlesController@destroy')->name('article.delete');

});

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
