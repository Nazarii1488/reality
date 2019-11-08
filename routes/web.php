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

Route::get('/','IndexController@index')->name('index');

Route::get('/offer','OfferController@index')->name('offers');
Route::get('/offer/add','OfferController@add')->name('offers-add')->middleware('auth');
Route::post('/offer/add/submit','OfferController@addSubmit')->name('offers-add-submit')->middleware('auth');
Route::get('/offer/add/edit/{offer}','OfferController@edit')->name('offers-edit')->middleware('auth', 'checkUser');
Route::post('/offer/editSubmit/{offer}','OfferController@editSubmit')->name('offers-edit-submit')->middleware('auth', 'checkUser');
Route::get('/offer/delete/{offer}','OfferController@delete')->name('offers-delete')->middleware('auth', 'checkUser' );
Route::get('/offer/view/{offer}','OfferController@view')->name('offers-view');
Route::post('/article/add/submit','ArticleController@addSubmit')->name('articles-add-submit');
Route::get('/article/edit/{article}','ArticleController@edit')->name('article-edit')->middleware('auth', 'checkArticleUser');
Route::post('/article/editSubmit/{article}','ArticleController@editSubmit')->name('article-edit-submit')->middleware('auth', 'checkArticleUser');
Route::get('/article/delete/{article}','ArticleController@delete')->name('article-delete')->middleware('auth', 'checkArticleUser');
Route::get('/users/viewUser/','UserController@personal')->name('personal')->middleware('auth');
Route::get('/offer/edit/{offer}/{imageOffer}','OfferController@deleteImage')->name('offers-edit-image')->middleware(['auth','checkUser']);
Route::get('/offer/search/','OfferController@search')->name('offers-search');



Route::get('/article','ArticleController@index')->name('article');
Route::get('/article/add','ArticleController@add')->name('article-add');

Auth::routes();


