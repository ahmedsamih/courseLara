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

Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/auth/view/{user}','Auth\RegistersUsers@UserView')->name('auth.users.view');
//Route::get('/auth/', 'Auth\RegisterController@index')->name('auth.users.index');

Route::get('/admin/students', 'StudentsController@index')->name('admin.students.index');
Route::get('/admin/students/create', 'StudentsController@create')->name('admin.students.create');
Route::get('/admin/courses', 'CoursesController@index')->name('admin.courses.index');
Route::get('/admin/courses/create', 'CoursesController@create')->name('admin.courses.create');
Route::get('/admin/teachers', 'TeachersController@index')->name('admin.teachers.index');
Route::get('/admin/teachers/create', 'TeachersController@create')->name('admin.teachers.create');

Route::post('/admin/students/save','StudentsController@save')->name('admin.students.save');
Route::get('/admin/students/edit/{student}','StudentsController@edit')->name('admin.students.edit');
Route::get('/admin/students/view/{student}','StudentsController@StudentView')->name('admin.students.view');
Route::post('/admin/students/delete','StudentsController@delete')->name('admin.students.delete');

Route::post('/admin/courses/save','CoursesController@save')->name('admin.courses.save');
Route::get('/admin/courses/edit/{course}','CoursesController@edit')->name('admin.courses.edit');
Route::get('/admin/courses/view/{course}','CoursesController@CourseView')->name('admin.courses.view');
Route::post('/admin/courses/delete','CoursesController@delete')->name('admin.courses.delete');

Route::post('/admin/teachers/save','TeachersController@save')->name('admin.teachers.save');
Route::get('/admin/teachers/edit/{teacher}','TeachersController@edit')->name('admin.teachers.edit');
Route::get('/admin/teachers/view/{teacher}','TeachersController@TeacherView')->name('admin.teachers.view');
Route::post('/admin/teachers/delete','TeachersController@delete')->name('admin.teachers.delete');

Route::get('/admin/users/view/{user}','UsersController@UserView')->name('admin.users.view');
Route::get('/admin/users', 'UsersController@index')->name('admin.users.index');

//Route::middleware(['auth', 'Checkadmin'])->group(function () {
//Route:resout
