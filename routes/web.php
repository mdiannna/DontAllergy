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
Route::get('/user-allergies', 'UserController@allergies')->name('user.allergies');

// User controller routes
Route::post('/user/post/save', 'UserController@savePost')->name('user.post.save');
Route::delete('/user/post/delete', 'UserController@deletePost')->name('user.post.delete');

Route::get('/user/profile', 'UserController@view')->name('user.profile.view');
Route::post('/user/get', 'UserController@get')->name('user.profile.get');
Route::post('/user/profile/update', 'UserController@update')->name('user.profile.update');


Route::get('/my-allergies', 'Admin\AllergyCrudController@myAllergies')->name('my_allergies');

Route::get('/add-allergy', 'Admin\AllergyCrudController@addAllergy')->name('add_allergy');
