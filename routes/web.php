<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/','App\Http\Controllers\FoldersController@index');
Route::get('/{folder_main}','App\Http\Controllers\FoldersController@main_folder');
Route::get('/folder/{folder_main}','App\Http\Controllers\FoldersController@sub_folder');
Route::post('/folder/form_folder','App\Http\Controllers\FoldersController@form_folder')->name("form_folder");
Route::post('/folder/delete_file','App\Http\Controllers\FoldersController@delete_file')->name("delete_file");
Route::post('/folder/delete_folder','App\Http\Controllers\FoldersController@delete_folder')->name("delete_folder");
Route::post('/folder/insert','App\Http\Controllers\FoldersController@folder_insert')->name("folder_insert");
Route::post('/folder/file_insert','App\Http\Controllers\FoldersController@file_insert')->name("file_insert");
Route::get('/appredirect/{key}','App\Http\Controllers\FoldersController@autologin');
Route::post('/search','App\Http\Controllers\FoldersController@search');
Route::post('/folder/delete_file_multiple','App\Http\Controllers\FoldersController@delete_multiple')->name('delete_file_multiple');
Route::post('/folder/delete_folder_multiple','App\Http\Controllers\FoldersController@delete_multiple_folder')->name('delete_folder_multiple');
Route::post('/folder/update-file','App\Http\Controllers\FoldersController@update_file')->name('update-file');

Route::get('/home','App\Http\Controllers\FoldersController@index');




