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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/contacto', function () {
    return view('contacto');
});




Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');

Route::group( ['middleware' => 'auth' ], function()
{
    Route::resource('/product','ProductsController');
    Route::resource('/modelo','ModelosController');
    Route::resource('/category','CategoriesController');
    Route::resource('/marca','MarcasController');
});
