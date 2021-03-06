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
Route::get('bookdelete/{id}','BookController@deleteBook');
Route::post('update-book','BookController@updateBook');
Route::post('book-record-update','BookController@updateRecordBook');

Route::post('update-student','StudentController@updateStudent');
Route::post('student-record-update','StudentController@updateRecordStudent');
Route::get('/deletestudent/{id}','StudentController@deleteStudent');



Route::post('update-list','IssuebokController@updateList');
Route::post('book-record-list','IssuebokController@updateRecordlist');
Route::get('/listdelete/{id}','IssuebokController@deleteissuebook');
Route::post('/studentupdate/{id}','StudentController@update');
Route::get('/issue','IssuebokController@issuebook');
Route::post('/issue-book','IssuebokController@saveissuebook');
Route::get('/show','IssuebokController@bookshow');
Route::get('/showstudent','IssuebokController@showstudent');
Route::get('/issuelist','IssuebokController@index');
Route::post('/listupdate/{id}','IssuebokController@updateissuebook');
Route::get('dashboard','Dashbordcontroller@counts');

//return book
Route::post('return-book','IssuebokController@returnbooks');
Route::post('return-book-data','IssuebokController@retunBooksave');
Route::get('return-book-record','IssuebokController@retunbookrecord');
Route::get('returnbook/{id}','IssuebokController@delteReturnBook');
//show Admmins
Route::get('show-admin','UserController@showadmins');
Route::post('add-admins','UserController@addAdmins');
Route::get('delete-role/{id}','UserController@deleterole');
Route::get('/student','StudentController@show');
Route::post('/addbook','StudentController@addstudent');






});



//dashbord data




Route::get('logout','AdminController@customLogout');
Route::get('admin/login','AdminController@adminLogin');
Route::post('admin-login','AdminController@customLogin')->name('admin-login');





Auth::routes();
