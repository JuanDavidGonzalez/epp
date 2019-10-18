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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::permanentRedirect('/', '/login');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');



    //User Routes...
    Route::middleware(['role:coordinator'])->prefix('usuarios')->name('user.')->group(function () {
        Route::get('index', 'UserController@index')->name('index');
        Route::get('{user}/editar', 'UserController@edit')->name('edit');
        Route::get('crear', 'UserController@create')->name('create');
        Route::post('crear', 'UserController@store')->name('store');
        Route::post('{user}/editar', 'UserController@update')->name('update');
    });

    //Item Routes...
    Route::middleware(['role:coordinator'])->prefix('items')->name('item.')->group(function () {
        Route::get('index', 'ItemController@index')->name('index');
        Route::get('{item}/editar', 'ItemController@edit')->name('edit');
        Route::get('crear', 'ItemController@create')->name('create');
        Route::post('crear', 'ItemController@store')->name('store');
        Route::put('{item}/editar', 'ItemController@update')->name('update');
    });

    //Activity Routes...
    Route::middleware(['role:coordinator'])->prefix('actividades')->name('activity.')->group(function () {
        Route::get('index', 'ActivityController@index')->name('index');
        Route::get('{activity}/editar', 'ActivityController@edit')->name('edit');
        Route::get('crear', 'ActivityController@create')->name('create');
        Route::post('crear', 'ActivityController@store')->name('store');
        Route::put('{activity}/editar', 'ActivityController@update')->name('update');

        Route::get('{activity}/list', 'ActivityController@list')->name('list');//API
    });

    //Request Routes...
    Route::prefix('solicitudes')->name('request.')->group(function () {
        Route::get('index', 'HomeController@index')->name('index');
        Route::get('crear', 'HomeController@create')->name('create');
        Route::get('{request}/editar', 'HomeController@edit')->name('edit');
        Route::post('crear', 'HomeController@store')->name('store');
        Route::post('{request}/editar', 'HomeController@update')->name('update');
    });
});
