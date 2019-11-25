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
Route::middleware(['auth'])->group(function(){
    Route::resource('auctions','AuctionController');
    Route::get('/admin', 'AdminPanelController@index')->name('admin');
});


Route::get('auctions.data','AuctionController@fetchData')->name('auctions.data');
Route::get('admin.data','AdminPanelController@fetchData')->name('admin.data')->middleware('isAdmin');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

