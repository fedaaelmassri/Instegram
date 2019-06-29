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
Route::get('/posts/{id}','PostController@view')->name('posts.view');
Route::namespace('Admin')->prefix('/admin')->group(function(){
    Route::get('posts','PostController@index') ;
    Route::get('posts/create','PostController@create') ;
    Route::post('posts/store','PostController@store') ;
    Route::get('posts/{id}','PostController@edit') ;
    Route::put('posts/{id}','PostController@update') ;
    Route::put('/posts/{id}','PostController@delete') ;
});
