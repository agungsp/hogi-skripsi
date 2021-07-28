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

Route::prefix('home')->name('home.')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::post('input-data-training', 'HomeController@inputDataTraining')->name('inputDataTraining');
    Route::post('input-text', 'HomeController@inputText')->name('inputText');
    Route::get('classifiedWords', 'HomeController@classifiedWords')->name('classifiedWords');
});

Route::prefix('singkatan')->name('singkatan.')->group(function () {
    Route::get('/', 'AbbrController@index')->name('index');
    Route::post('/', 'AbbrController@upload')->name('upload');
    Route::post('edit', 'AbbrController@edit')->name('edit');
});
