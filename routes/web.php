<?php

// use Symfony\Component\Routing\Annotation\Route;

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

Route::get('/','WebController@index');
Route::get('/faq','WebController@faq');
Route::get('/register','WebController@register');
Route::post('/register','WebController@faq');
Route::get('/login','WebController@login');
Route::post('/login','WebController@faq');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
