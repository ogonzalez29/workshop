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

//Pages routes
Route::get('confirm', 'PagesController@getConfirm');
Route::get('print', 'PagesController@getPrint');
Route::get('config', 'PagesController@getConfig');
Route::get('profile', 'PagesController@getProfile');
Route::get('index', 'PagesController@getIndex');
Route::get('login', 'PagesController@getLogin');

//CRUD routes
Route::resource('qdocs', 'QdocsController');

//Jquery & Ajax routes for dropdown dependent in forms
Route::get('qdocs/create', array('as'=>'create', 'uses'=>'DropDownController@makes'));
Route::get('types/{id}', 'DropDownController@types');

//Data passing to qdocs.create page
Route::get('qdocs/create', array('as'=>'create', 'uses'=>'QdocsController@create'));

//Snappy pdfcreator routes
Route::get('qdocs/{qdoc}/pdf', 'PdfController@getQdocsPdf');

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
