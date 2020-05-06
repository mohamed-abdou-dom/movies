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

// the movies routes
Route::get('/', 'MoviesController@index');
Route::get('/show/{id}', 'MoviesController@show');
Route::post('/movies/search', 'MoviesController@search');

// the actors routes
Route::get('/actors', 'ActorsController@index');
Route::get('/actors/show/{id}', 'ActorsController@show');
Route::post('/actors/movies/search', 'ActorsController@search');
