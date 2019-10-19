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

Route::get('/', function () {
    return view('layouts.app');
});

Auth::routes();
Route::group( ['middleware' => ['auth']], function() {
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('posts', 'PostController');
});
// Route::get('/home', 'HomeController@index')->name('home');

// Route for users
route::get('/user/index', 'UserController@index')->name('users.index');
route::get('/user/create', 'UserController@create')->name('users.create');
route::post('/user/store', 'UserController@store')->name('users.store');
route::get('/user/show/{id}', 'UserController@show')->name('users.show');
route::get('/user/edit/{id}', 'UserController@edit')->name('users.edit');
route::patch('/user/update/{id}', 'UserController@update')->name('users.update');
route::delete('/user/destroy/{id}', 'UserController@destroy')->name('users.destroy');

// Route for providers
route::get('/providers/index', 'ProviderController@index')->name('providers.index');
route::get('/providers/create', 'ProviderController@create')->name('providers.create');
route::post('/providers/store', 'ProviderController@store')->name('providers.store');
route::get('/providers/show/{id}', 'ProviderController@show')->name('providers.show');
route::get('/providers/edit/{id}', 'ProviderController@edit')->name('providers.edit');
route::patch('/providers/update/{id}', 'ProviderController@update')->name('providers.update');
route::delete('/providers/destroy/{id}', 'ProviderController@destroy')->name('providers.destroy');

// Route for roles
route::get('/role/index', 'RoleController@index')->name('roles.index');
route::get('/role/create', 'RoleController@create')->name('roles.create');
route::post('/role/store', 'RoleController@store')->name('roles.store');
route::get('/role/show/{id}', 'RoleController@show')->name('roles.show');
route::get('/role/edit/{id}', 'RoleController@edit')->name('roles.edit');
route::patch('/role/update/{id}', 'RoleController@update')->name('roles.update');
route::delete('/role/destroy/{id}', 'RoleController@destroy')->name('roles.destroy');