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
Route::resource('/product','ProductsController');

Route::group( ['middleware' => 'auth' ], function()
{

    Route::resource('/modelo','ModelosController');
    Route::resource('/category','CategoriesController');
    Route::resource('/marca','MarcasController');
    Route::post('/product/{slug}/delete','ProductsController@delete');
    Route::get('/borrados/product','ProductsController@borrados');
    Route::get('/borrados/showProduct/{slug}','ProductsController@restaurar');
    Route::post('/product/{id}/destroy', 'ProductsController@destroy');
    Route::post('/product/{id}/restore', 'ProductsController@restore');

});
