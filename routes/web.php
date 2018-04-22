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


// Route::get('', function () {
//     return view('welcome');
// });

Route::get('/home', function () {
    return redirect('/');
})->name('home');


Auth::routes();


Route::get('/admin/login', function () {
    return redirect('/login');
});

Route::get('/admin/register', function () {
    return redirect('/register');
});


Route::get('/forum', 'HomeController@forum')->name('forum');
Route::get('/user-allergies', 'UserController@allergies')->name('user.allergies');

// User controller routes
Route::post('/user/post/save', 'UserController@savePost')->name('user.post.save');
Route::delete('/user/post/delete', 'UserController@deletePost')->name('user.post.delete');

Route::get('/user/profile', 'UserController@view')->name('user.profile.view');
Route::post('/user/get', 'UserController@get')->name('user.profile.get');
Route::post('/user/profile/update', 'UserController@update')->name('user.profile.update');


Route::get('/my-allergies', 'Admin\AllergyCrudController@myAllergies')->name('my_allergies');

Route::get('/my-allergies-current-season', 'Admin\AllergyCrudController@myAllergiesCurrentSeason')->name('my_allergies_current_season');

Route::get('/add-allergy', 'Admin\AllergyCrudController@addAllergy')->name('add_allergy');

Route::post('/submit-allergy', 'Admin\AllergyCrudController@submitAllergy')->name('submit_allergy');

Route::get('/my-statistics', 'Admin\StatisticsCrudController@myStatistics')->name('my_statistics');

Route::get('/all-statistics', 'Admin\StatisticsCrudController@allStatistics')->name('all_statistics');


Route::get('/view-allergy/{id}', 'Admin\AllergyCrudController@viewAllergy')->name('view_allergy');
