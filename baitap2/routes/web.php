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
    return view('welcome');
});
Route::get('index','Controller@index');

Route::get('danhmuc/{id}','Controller@category');

Route::get('chitietsp/{id}','Controller@chitietsp');

Route::get('themgiohang/{id}','Controller@themgiohang');

Route::get('suahang','Controller@suahang');

Route::get('xoagiohang/{id}','Controller@xoagiohang');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login','Controller@login');

Route::post('checklogin','Controller@checkLogin');

Route::get('logout','Controller@logout');

Route::get('taouser','Controller@taouser');

Route::post('addUser','Controller@addUser');

Route::get('updateCart','Controller@updateCart');

Route::get('deleteCart','Controller@deleteCart');

Route::post('xacnhandonhang','Controller@xacnhandonhang');

Route::get('hoanthanhdathang','Controller@hoanthanhdathang');

Route::post('search','Controller@search');
