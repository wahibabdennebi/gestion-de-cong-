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
Route::view('/Calendrierdelentreprise','calend2');

route::get('/Vueconge','CongeController@show');
route::get('/validationurl','Eventcontroller@validation');
Route::resource('event','Eventcontroller');
Route::resource('eventt','Eventtcontroller');
Auth::routes();
route::put('validationurll','Eventcontroller@test')->name('validationEvents');
route::get('/addeventurl','Eventcontroller@display');
route::get('displaydata','Eventcontroller@show');
route::delete('deletedata','Eventcontroller@destroy')->name('deleteEvents');
route::put('/updateevent','Eventcontroller@update')->name('UpdateEvents');
route::post('/addequipe','EmployeController@store')->name('AddEquipes');
route::delete('deletequipe','EmployeController@destroy')->name('deleteEquipe');
route::post('adduser','EmployeController@adduser')->name('adduser');
route::get('employeurl','EmployeController@show');
route::post('test','EmployeController@ajax')->name("test");
route::post('testt','EmployeController@name')->name("testt");
route::post('deleteuser','EmployeController@deletename')->name('deleteuser');
Route::get('/home', 'HomeController@index')->name('home');
route::get('roleurl','RoleController@show');
route::post('admin','RoleController@admin')->name("admin");
route::post('user','RoleController@user')->name("user");
route::get('search','CongeController@search');
route::get('modifierSolde','EmployeController@getUser');
route::get('/editProfil/{id}','Eventcontroller@editProfil')->name("editProfil");

Route::get('/soldeconge','SoldeCongeController@GetAllUsers');
route::put('/update','SoldeCongeController@updateSoldeConge')->name('UpdateSolde');
route::put('/ajouter','SoldeCongeController@updateRateSolde')->name('updateRateSolde');



