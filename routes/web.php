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

// ブログ一覧画面を表示
Route::get('/', 'BlogController@showList')->name('blogs');

// ブログ詳細画面
Route::get('/blog/{id}', 'BlogController@showDetal')->name('detail');

// ブロク登録画面
Route::get('/create', 'BlogController@showCreate')->name('create');

// ブロク登録
Route::post('/store', 'BlogController@storeBlog')->name('store');

// ブロク編集画面
Route::get('/edit{id}', 'BlogController@showEdit')->name('edit');

// ブロク更新処理
Route::post('/update', 'BlogController@exeUpdate')->name('update');

// ブロク更新処理
Route::get('/delete{id}', 'BlogController@deleteBlog')->name('delete');
