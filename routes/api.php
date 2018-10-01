<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::get('admins', 'AdminController@index');
Route::get('admins/{admins}', 'AdminController@show');
Route::get('admins/getAdminId/{userId}', 'AdminController@getAdminId');
Route::get('admins/OrgCode/{adminId}', 'AdminController@getOrgCode');
Route::post('admins', 'AdminController@store');
Route::put('admins/{admins}', 'AdminController@update');
Route::delete('admins/{admins}', 'AdminController@delete');

Route::get('employees', 'EmployeeController@index');
Route::get('employees/EmployeeOf/{employees}', 'EmployeeController@show');
Route::get('employees/EmployeeId/{UserId}', 'EmployeeController@showEmployee');
Route::get('employees/{id}', 'EmployeeController@OrgCode');
Route::get('employees/getAdminId/{orgCode}', 'EmployeeController@getAdminId');
Route::post('employees', 'EmployeeController@store');
Route::put('employees/{employees}', 'EmployeeController@update');
Route::delete('employees/{employees}', 'EmployeeController@delete');

Route::get('attendances', 'AttendanceController@index');
Route::get('attendances/{attendances}', 'AttendanceController@show');
Route::get('attendances/CheckedIn/{attendance}', 'AttendanceController@showEmployee');
Route::get('attendances/Report/{id}','AttendanceController@report');
Route::post('attendances', 'AttendanceController@store');
Route::put('attendances/{attendance}', 'AttendanceController@update');
Route::delete('attendances/{attendances}', 'AttendanceController@delete');

Route::get('qr_codes', 'QR_CodeController@index');
Route::get('qr_codes/{qr_codes}', 'QR_CodeController@show');
Route::post('qr_codes', 'QR_CodeController@store');
Route::put('qr_codes/{qr_codes}', 'QR_CodeController@update');
Route::delete('qr_codes/{qr_codes}', 'QR_CodeController@delete');

Route::get('org_codes', 'Org_CodeController@index');
Route::get('org_codes/{org_codes}', 'Org_CodeController@show');
Route::post('org_codes', 'Org_CodeController@store');
Route::put('org_codes/{org_codes}', 'Org_CodeController@update');
Route::delete('org_codes/{org_codes}', 'Org_CodeController@delete');



