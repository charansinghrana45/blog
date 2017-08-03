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

Route::get('/',function () {
    return view('user.home');
});

Route::get('post', function () {
    return view('user.post');
})->name('post');


// Admin Routs....
Route::group(['namespace' => 'Admin', 'middleware' => 'web'], function () {
	
	Route::get('admin/home', 'HomeController@index')->name('admin.home');
	Route::resource('admin/post', 'PostController');
	Route::resource('admin/category', 'categoryController');
	Route::resource('admin/tag', 'tagController');
	Route::resource('admin/user', 'userController');

});
