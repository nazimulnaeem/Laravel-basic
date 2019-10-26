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

Route::get('/search', 'Admin\AdminPagesController@search')->name('search');
Route::get('/dateandtime', 'DateAdnTimeController@date_and_time')->name('dateandtime');

Route::group(['prefix'=>'admin','middelware'=>'auth','namespace'=>'Admin'], function(){

    Route::get('/', 'AdminPagesController@admin')->name('admin');
    Route::get('/post', 'AdminPagesController@index')->name('admin.index');
    Route::get('/post/view', 'AdminPagesController@view')->name('admin.view');
    Route::get('/post/show/{id}', 'AdminPagesController@post_show')->name('admin.post.show');
    Route::post('/post/store', 'AdminPagesController@store')->name('admin.post.store');
    Route::get('/post/edit/{id}', 'AdminPagesController@post_edit')->name('admin.post.edit');
    Route::post('/update/{id}', 'AdminPagesController@post_update')->name('admin.post.update');
    Route::delete('/delete/{id}', 'AdminPagesController@post_delete')->name('admin.post.delete');


    Route::get('/profile/{id}', 'AdminPagesController@profile')->name('admin.profile');
    Route::post('/profile/{id}', 'AdminPagesController@profile_update')->name('admin.profile.update');
});

// Route::post('/post/store', 'PostController@store')->name('post.store');
// Route::get('', 'PostController@edit')->name('post.edit');
// Route::post('', 'PostController@update')->name('post.update');
// Route::delete('', 'PostController@delete')->name('post.delete');
