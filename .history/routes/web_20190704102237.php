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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/aboutme/fedaa',function(){
    return 'Fedaa El-massri';
});
Route::get('/contact',function(){
    return[
        'name'=>'Fedaa',
        'job'=>'Developer',
    ];
});
Route::get('/','PostController@index')->name('home');
Route::get('/posts','PostController@index')->name('posts')->middleware(['verified','admin']);

 Route::get('/posts/{id}','PostController@view')->name('posts.view');
Route::prefix('admin/posts')->namespace('Admin')->name('admin.posts')->group(function() {
	Route::get('/', 'PostController@index')->name('');
	Route::get('/create', 'PostController@create')->name('.create');
	Route::post('/', 'PostController@store')->name('.store');
	Route::get('/trashed','PostController@trashed')->name('.trashed');
	Route::put('/restore/{id}', 'PostController@restore')->name('.restore');
	Route::delete('/trashed/{id}/delete', 'PostController@forceDelete')->name('.forceDelete');
	Route::get('/{id}', 'PostController@edit')->name('.edit');
	Route::put('/{id}', 'PostController@update')->name('.update');
	Route::delete('/{id}', 'PostController@delete')->name('.delete');

});
Route::prefix('admin/tags')->namespace('Admin')->name('admin.tags')->group(function() {
	Route::get('/', 'TagController@index')->name('');
	Route::get('/create', 'TagController@create')->name('.create');
	Route::post('/', 'TagController@store')->name('.store');
	Route::get('/trashed','TagController@trashed')->name('.trashed');
	Route::put('/restore/{id}', 'TagController@restore')->name('.restore');
	Route::delete('/trashed/{id}/delete', 'TagController@forceDelete')->name('.forceDelete');
	Route::get('/{id}', 'TagController@edit')->name('.edit');
	Route::put('/{id}', 'TagController@update')->name('.update');
	Route::delete('/{id}', 'TagController@delete')->name('.delete');

});
// Route::resource('/categories',CategoryController);//->except(['view']);ماعدا

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
