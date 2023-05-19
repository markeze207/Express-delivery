<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'visitor'], function() {
    Route::get('/', 'MainController@index')->name('main');
    Route::get('/posts', 'PostController@index')->name('posts.index');
    Route::get('/posts/{post}', 'PostController@show')->name('posts.show');


    Route::group(['namespace' => 'Markets'], function() {
        Route::get('/wildberries', 'WildberriesController@index')->name('wildberries.index');
        Route::get('/wb-form', 'WildberriesController@form')->name('wildberries.form');
        Route::post('/wb', 'WildberriesController@store')->name('wildberries.store');

        Route::get('/ozon', 'OzonController@index')->name('ozon.index');
        Route::get('/ozon-form', 'OzonController@form')->name('ozon.form');
        Route::post('/ozon', 'OzonController@store')->name('ozon.store');

        Route::get('/yandex-market', 'YandexController@index')->name('yandex.index');
        Route::get('/yandex-form', 'YandexController@form')->name('yandex.form');
        Route::post('/yandex', 'YandexController@store')->name('yandex.store');
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::group(['namespace' => 'Orders'], function() {
        Route::get('/orders', 'OrdersController@index')->name('orders.index');
        Route::get('/orders/{order}', 'OrdersController@show')->name('orders.show');
        Route::get('/orders/edit/{order}', 'OrdersController@edit')->name('orders.edit');
        Route::patch('/orders/{order}', 'OrdersController@update')->name('orders.update');
        Route::delete('/orders/{order}', 'OrdersController@destroy')->name('orders.destroy');
    });
    Route::group(['namespace' => 'Post'], function() {
        Route::get('/post', 'PostController@index')->name('admin.post.index');
        Route::get('/post/create', 'PostController@create')->name('admin.post.create');
        Route::post('/post/create', 'PostController@store')->name('admin.post.store');
        Route::get('/post/edit/{post}', 'PostController@edit')->name('admin.post.edit');
        Route::patch('/post/edit/{post}', 'PostController@update')->name('admin.post.update');
        Route::delete('/post/{post}', 'PostController@destroy')->name('admin.post.destroy');
    });
    Route::group(['namespace' => 'User'], function() {
        Route::get('/user', 'UserController@index')->name('admin.user.index');
        Route::get('/user/edit/{user}', 'UserController@edit')->name('admin.user.edit');
        Route::patch('/user/edit/{user}', 'UserController@update')->name('admin.user.update');
        Route::delete('/user/{user}', 'UserController@destroy')->name('admin.user.destroy');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
