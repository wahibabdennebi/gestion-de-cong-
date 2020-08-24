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
Route::view('/contact', 'contact');
Route::view('/Edit', 'edit');
Route::view('/calendrier','calend');
route::view('/wahib','wahib');
Route::resource('event','Eventcontroller');
Auth::routes();
route::get('/addeventurl','Eventcontroller@display');
route::get('displaydata','Eventcontroller@show');
route::put('/update','Eventcontroller@update')->name('UpdateEvents');
Route::get('/home', 'HomeController@index')->name('home');
