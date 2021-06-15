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

Route::get('/home', 'HomeController@index');
Route::get('/tenant', 'TeacherController@teacher');
Route::get('/student', 'viewController@student');

Route::get('/admin', 'viewController@admin');
Route::get('/addtenant', 'viewController@adduser');
Route::get('/alltenants','viewController@allusers');

Route::get('/allteachers','viewController@allteachers');
Route::get('/addstudent','viewController@addstudent');
Route::get('/newroom','RoomController@newroom');
Route::post('addroom','RoomController@addroom');
Route::get('delete-room/{id}','RoomController@Deleteroom');

Route::get('/allrooms','RoomController@allrooms');
Route::get('update-room/{id}','RoomController@updateroom');
Route::post('updatedroom/{id}','RoomController@updatedroom');
Route::get('/vacant','RoomController@vacant');
Route::get('/occupied','RoomController@occupied');

Route::get('/logout', 'viewController@logout');
Route::post('new-user','viewController@new_user');

Route::get('update-user/{id}','viewController@updateuser');
Route::post('updateduser/{id}','viewController@updateduser');
Route::get('delete-user/{id}','viewController@Deleteuser');

Route::get('invoice','InvoiceController@invoices');
Route::get('profile','viewController@viewprofile');
Route::post('update-user/{id}','viewController@updateadmin');


Route::get('viewroom','RoomController@viewroom');
Route::get('paynow','RoomController@paynow');
Route::post('pay-ments','RoomController@pay_ments');
Route::get('payhistory','RoomController@payhistory');
Route::get('reportroom','RoomController@reportroom');
Route::post('report-room','RoomController@report_room');
Route::get('tenant-invoice','RoomController@tenantinvoice');
Route::get('downloadinvoice','RoomController@dinvoice');




Route::get('mpesa/register','MpesaController@index')->name('mpesa.register');