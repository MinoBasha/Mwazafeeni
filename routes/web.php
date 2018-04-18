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

Auth::routes();

Route::resource('employee', 'EmployeeModelController');

Route::post('/employee',"EmployeeModelController@store");

Route::get('/employee/create',"EmployeeModelController@create");
Route::get('/employee/{id}',"EmployeeModelController@show");

Route::get('/employee/{id}/delete',"EmployeeModelController@destroy");

Route::get('/home', 'HomeController@index')->name('home');
