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
Route::group(['middleware' => ['auth']], function () {

    Route::get('dashboard','AdminController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/book','BookController@showbook');
    Route::post('/add','BookController@addBook');
    Route::post('/update/{id}','BookController@update');
    Route::get('/delete/{id}','BookController@deleteBook');

});

Route::post('update-student','StudentController@updateStudent');
Route::post('student-record-update','StudentController@updateRecordStudent');

Route::get('logout','AdminController@customLogout');
Route::get('admin/login','AdminController@adminLogin');
Route::post('admin-login','AdminController@customLogin');
Route::get('/student','StudentController@show');
Route::post('/addbook','StudentController@addstudent');
Route::post('/studentupdate/{id}','StudentController@update');
Route::get('/deletestudent/{id}','StudentController@deleteStudent');
Route::get('/issue','IssuebokController@issuebook');
Route::post('/issue-book','IssuebokController@saveissuebook');
Route::get('/show','IssuebokController@bookshow');
Route::get('/showstudent','IssuebokController@showstudent');
Route::get('/issuelist','IssuebokController@index');
Route::post('/listupdate/{id}','IssuebokController@updateissuebook');
Route::get('/listdelete/{id}','IssuebokController@deleteissuebook');
Auth::routes();