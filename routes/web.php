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

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Console\RuleMakeCommand;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/ritten', 'RitController@index');
    Route::get('/ritten/create', 'RitController@create');
    Route::post('/ritten/store', 'RitController@store');

    Route::get('/locations', 'LocationController@index');
    Route::post('/locations/store', 'LocationController@store');
    Route::get('/locations/delete/{location}', 'LocationController@destroy');

    Route::get('find', 'LocationController@find');
});
