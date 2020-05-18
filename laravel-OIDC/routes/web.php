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
Route::get('/', 'OidcController@index')->name('openid.index');
Route::get('/dashbord', 'OidcController@dashbord')->name('openid.dashbord');
Route::get('/oidc/get/token', 'OidcController@OidcGetToken')->name('openid.login');
Route::get('/logout', 'OidcController@logOut')->name('openid.login');
