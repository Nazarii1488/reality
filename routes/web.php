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

Route::get('/admin/offers/','Admin\OfferController@index')->name('admin-offers')->middleware(['auth','checkAdmin']);
Route::get('/admin/offers/edit/{offer}','Admin\OfferController@edit')->name('admin-offers-edit')->middleware(['auth','checkAdmin']);
Route::post('/admin/offers/edit/submit/{offer}','Admin\OfferController@editSubmit')->name('admin-offers-edit-submit')->middleware(['auth','checkAdmin']);
Route::get('/admin/offers/delete/{offer}','Admin\OfferController@delete')->name('admin-offers-delete')->middleware(['auth','checkAdmin']);
Route::get('/admin/offers/edit/{offer}/{imageOffer}','Admin\OfferController@deleteImages')->name('admin-offers-edit-image')->middleware(['auth','checkAdmin']);

Route::get('/admin/article/','Admin\ArticleController@index')->name('admin-article')->middleware(['auth','checkAdmin']);
Route::get('/admin/article/edit/{article}','Admin\ArticleController@edit')->name('admin-article-edit')->middleware(['auth','checkAdmin']);
Route::post('/admin/article/edit/submit/{article}','Admin\ArticleController@editSubmit')->name('admin-article-edit-submit')->middleware(['auth','checkAdmin']);
Route::get('/admin/article/delete/{article}','Admin\ArticleController@delete')->name('admin-article-delete')->middleware(['auth','checkAdmin']);
Route::get('/admin/article/edit/{article}/{imageArticle}','Admin\ArticleController@deleteImages')->name('admin-article-edit-image')->middleware(['auth','checkAdmin']);

Route::get('/article','ArticleController@index')->name('article');
Route::get('/article/add','ArticleController@add')->name('article-add');



Auth::routes();


