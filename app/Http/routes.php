<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');


Route::get('category', 'CategoryController@index');
Route::get('category/create', 'CategoryController@create');

Route::post('category/create', ['as' => 'category.create', 'uses' => 'CategoryController@create']);

Route::get('magazine', 'MagazineController@index');
Route::get('magazine/create', 'MagazineController@create');

Route::post('magazine/create', ['as' => 'magazine.create', 'uses' => 'MagazineController@create']);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

