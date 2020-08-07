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

Route::get('/', 'HomeController@index')->name('welcome');

Auth::routes();

Route::get('/student', 'StudentController@dashboard')->name('student')->middleware(['auth', 'student']);
Route::get('/teacher', 'TeacherController@dashboard')->name('teacher')->middleware(['auth', 'teacher']);;

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/home', 'AdminController@index')->name('admin.dashboard');
	Route::get('/payments', 'AdminController@payments')->name('admin.payments');
	Route::get('/resources', 'AdminController@resources')->name('admin.resources');
	// Route::get('/subjects', 'AdminController@subjects')->name('admin.subjects');
	Route::resource('/subjects', 'SubjectController');
	Route::get('/topics', 'AdminController@topics')->name('admin.topics');

	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


	// Password Reset Routes

	Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
	Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});