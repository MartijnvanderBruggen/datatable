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

Route::resource('auctions','AuctionController');

Route::get('auctions.data','AuctionController@fetchData')->name('auctions.data');
Route::get('admin.data','AdminPanelController@fetchData')->name('admin.data');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminPanelController@index')->name('admin');
