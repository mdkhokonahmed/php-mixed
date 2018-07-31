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

/* Admin Start */

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

/* Admin End */



/* Room Start */

Route::get('/addroom', 'RoomController@addroom');
Route::post('/saveroom', 'RoomController@StoreRoom');
Route::get('/roomlist', 'RoomController@ListRoom');
Route::get('/edit/room/{id}', 'RoomController@RoomEdit');
Route::post('/update/room', 'RoomController@UpdateRoom');
Route::get('/delete/room/{id}', 'RoomController@RoomDelete');
Route::get('/search', 'RoomController@tablesearch');

/* Room End */

/* Department Start */
Route::get('/adddepartment', 'DepartmentController@adddepartment');
Route::post('/savedepartment', 'DepartmentController@storeDepartment');
Route::get('/departmentlist', 'DepartmentController@departmentlist');
Route::get('/edit/department/{id}', 'DepartmentController@departmentEdit');
Route::post('/updatedepartment', 'DepartmentController@UpdateDepartment');
Route::get('/delete/department/{id}', 'DepartmentController@departmentDelete');
/* Department end */

/* Student Start */
Route::get('/addstudent', 'StudentController@addstudent');
Route::post('/savestudent', 'StudentController@storeStudent');
Route::get('/studenttlist', 'StudentController@studentList');
Route::get('/edit/student/{id}', 'StudentController@studentEdit');
Route::post('/updatestudentprofile', 'StudentController@studentupdated');
Route::get('/delete/student/{id}', 'StudentController@studentDelete');

/* Payment Student */

Route::get('/addpayment', 'PaymentController@addpayment');
Route::post('/paymentstudent', 'PaymentController@StorePayment');