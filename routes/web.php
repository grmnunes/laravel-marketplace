<?php

use App\Http\Controllers\Admin\ProductPhotoController;
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
    return view('welcome');
})->name('home');


Route::group(['middleware'=> ['auth']], function() {

    Route::prefix('admin')->namespace('Admin')->group(function() {
        Route::prefix('stores')->group(function() {

            Route::get('/', 'StoreController@index')->name('store.index');
            Route::get('/create', 'StoreController@create')->name('store.create');
            Route::post('/store', 'StoreController@store')->name('store.save');
            Route::get('/{store}/edit', 'StoreController@edit')->name('store.edit');
            Route::post('/update/{store}', 'StoreController@update')->name('store.update');
            Route::get('/destroy/{store}', 'StoreController@destroy')->name('store.destroy');

        });

        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');
        Route::post('/photos/remove/{photoName}', 'ProductPhotoController@removePhoto')->name('photo.remove');
    });
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
