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
Route::get('/','tagTagController@index')->name('home');
Route::get('/tags/{id}','tagTagController@view')->name('tags.view');
Route::prefix('admin/tags')->namespace('Admin')->name('admin.tags')->group(function() {
	Route::get('/', 'tagTagController@index')->name('');
	Route::get('/create', 'tagTagController@create')->name('.create');
	Route::post('/', 'tagTagController@store')->name('.store');
	Route::get('/trashed','tagTagController@trashed')->name('.trashed');
	Route::put('/restore/{id}', 'tagTagController@restore')->name('.restore');
	Route::delete('/trashed/{id}/delete', 'tagTagController@forceDelete')->name('.forceDelete');
	Route::get('/{id}', 'tagTagController@edit')->name('.edit');
	Route::put('/{id}', 'tagTagController@update')->name('.update');
	Route::delete('/{id}', 'tagTagController@delete')->name('.delete');

});
Route::prefix('admin/tags')->namespace('Admin')->name('admin.tags')->group(function() {
	Route::get('/', 'tagTagController@index')->name('');
	Route::get('/create', 'tagTagController@create')->name('.create');
	Route::post('/', 'tagTagController@store')->name('.store');
	Route::get('/trashed','tagTagController@trashed')->name('.trashed');
	Route::put('/restore/{id}', 'tagTagController@restore')->name('.restore');
	Route::delete('/trashed/{id}/delete', 'tagTagController@forceDelete')->name('.forceDelete');
	Route::get('/{id}', 'tagTagController@edit')->name('.edit');
	Route::put('/{id}', 'tagTagController@update')->name('.update');
	Route::delete('/{id}', 'tagTagController@delete')->name('.delete');

});
// Route::resource('/categories',CategoryController);//->except(['view']);ماعدا
