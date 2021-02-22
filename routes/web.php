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


Route::middleware(['auth'])->group(function() {
    Route::namespace('Web\Client')->group(function () {
        // Route::get('/read-later', '')->name('client-read-later');
        Route::prefix('account')->group(function () { 
            Route::get('/', 'UserController@edit')->name('client-user.edit');
            Route::put('/', 'UserController@update')->name('client-user.update');

            Route::delete('/', 'UserController@destroy')->name('client-user.delete');
        });
    });
 

    Route::middleware(['admin'])->group(function() {

        Route::namespace('Web\Admin')->group(function () {

            Route::prefix('dashboard')->group(function () { 

                Route::get('/', 'DashboardController@index')->name('dashboard.index');

                Route::prefix('posts')->group(function () { 
                    Route::get('/', 'PostController@index')->name('admin-post.index');
                    Route::get('/create', 'PostController@create')->name('admin-post.create');
                    Route::post('/', 'PostController@store')->name('admin-post.store');                  
                    Route::put('/{id}', 'PostController@update')->name('admin-post.update');
    
                    Route::get('/{id}', 'PostController@show')->name('admin-post.show');
                    Route::get('/{id}/edit', 'PostController@edit')->name('admin-post.edit');
    
                    Route::post('/{id}/restore', 'PostController@restore')->name('admin-post.restore');
                    Route::delete('/{id}', 'PostController@destroy')->name('admin-post.delete');

                });
    
                Route::middleware(['restrict-author'])->group( function() {    
                    Route::prefix('users')->group(function () { 
                        
                        Route::get('/', 'UserController@index')->name('admin-users.index');
                        Route::get('/user/{id}', 'UserController@show')->name('admin-users.show');
                        Route::put('/user/{id}', 'UserController@update')->name('admin-users.update');
                        Route::get('/user/{id}/edit', 'UserController@edit')->name('admin-users.edit');
        
                        Route::delete('/user/{id}', 'UserController@destroy')->name('admin-users.delete');
                    }); 
                    
                    Route::prefix('categories')->group(function () { 
                
                        Route::get('/', 'CategoryController@index')->name('admin-categories.index');
                        Route::get('/create', 'CategoryController@create')->name('admin-categories.create');
                        Route::post('/', 'CategoryController@store')->name('admin-categories.store');
                        Route::put('/{id}', 'CategoryController@update')->name('admin-categories.update');
        
                        Route::get('/{id}', 'CategoryController@show')->name('admin-categories.show');
                        Route::get('/{id}/edit', 'CategoryController@edit')->name('admin-categories.edit');
        
                        Route::delete('/{id}', 'CategoryController@destroy')->name('admin-categories.delete');
                    });

                });
                          
                
            });
           
        });
    });
});

Route::namespace('Web\Client')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/search', 'SearchController@index')->name('search');
    Route::get('/{category}/{slug}', 'PostController@show')->name('post.show');
    Route::get('/{category}', 'CategoryController@show')->name('category.show');
});
