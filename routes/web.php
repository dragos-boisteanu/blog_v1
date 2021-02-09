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

require __DIR__.'/auth.php';

Route::namespace('Web\Client')->group(function () {
    Route::get('/', 'HomeController')->name('home');
    Route::get('/{category}/{slug}', 'PostController')->name('post.show');
    Route::get('/{category}', 'CategoryController')->name('category.show');

});

Route::middleware(['auth'])->group(function() {
    Route::namespace('Web\Client')->group(function () {
        Route::prefix('account')->group(function () { 
            Route::get('/', 'UserController@edit')->name('client-user.edit');
            Route::patch('/', 'UserController@update')->name('client-user.update');

            Route::delete('/', 'UserController@destroy')->name('client-user.delete');
        });
    });
 
    Route::middleware(['admin'])->group(function() {
        Route::namespace('Web\Admin')->group(function () {

            Route::prefix('dashboard')->group(function () { 
                Route::get('/', 'DashboardController')->name('dashboard.index');

                Route::prefix('post')->group(function () { 
                    Route::get('/', 'PostController@index')->name('admin-post.index');
                    Route::get('/', 'PostController@create')->name('admin-post.create');
                    Route::post('/', 'PostController@store')->name('admin-post.store');
                    Route::patch('/', 'PostController@update')->name('admin-post.update');
    
                    Route::get('/{id}', 'PostController@show')->name('admin-post.show');
                    Route::get('/{id}', 'PostController@edit')->name('admin-post.edit');
    
                    Route::delete('/{id}', 'PostController@destroy')->name('admin-post.delete');
                });
    
                Route::prefix('users')->group(function () { 
                    Route::get('/', 'UserController@index')->name('admin-user.index');
                    Route::get('/', 'UserController@create')->name('admin-user.create');
                    Route::post('/', 'UserController@store')->name('admin-user.store');
                    Route::patch('/', 'UserController@update')->name('admin-user.update');
    
                    Route::get('/{id}', 'UserController@show')->name('admin-user.show');
                    Route::get('/{id}', 'UserController@edit')->name('admin-user.edit');
    
                    Route::delete('/{id}', 'UserController@destroy')->name('admin-user.delete');
                });
    
                Route::prefix('categories')->group(function () { 
                    Route::get('/', 'CategoryController@index')->name('admin-category.index');
                    Route::get('/', 'CategoryController@create')->name('admin-category.create');
                    Route::post('/', 'CategoryController@store')->name('admin-category.store');
                    Route::patch('/', 'CategoryController@update')->name('admin-category.update');
    
                    Route::get('/{id}', 'CategoryController@show')->name('admin-category.show');
                    Route::get('/{id}', 'CategoryController@edit')->name('admin-category.edit');
    
                    Route::delete('/{id}', 'CategoryController@destroy')->name('admin-category.delete');
                });
    
                Route::prefix('roles')->group(function () { 
                    Route::get('/', 'RoleController@index')->name('admin-role.index');
                    Route::get('/', 'RoleController@create')->name('admin-role.create');
                    Route::post('/', 'RoleController@store')->name('admin-role.store');
                    Route::patch('/', 'RoleController@update')->name('admin-role.update');
    
                    Route::get('/{id}', 'RoleController@show')->name('admin-role.show');
                    Route::get('/{id}', 'RoleController@edit')->name('admin-role.edit');
    
                    Route::delete('/{id}', 'RoleController@destroy')->name('admin-role.delete');
    
                });
            });
           
        });
    });
});
