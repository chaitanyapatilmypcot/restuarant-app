<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RestoController;

use App\Http\Controllers\UserController;

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


Route::get('/', 'RestoController@view');



Route::get('register', 'UserController@register');
Route::post('/register', 'UserController@registerUser');

Route::get('login', 'UserController@login');
Route::post('/login', 'UserController@loginUser');

Route::get('logout', 'UserController@logout');


// Middleware
Route::group(['middleware' => ['protectedPage']], function(){
    
    Route::get('list', 'RestoController@list');

    Route::view('add', 'addResto');
    Route::post('/add', 'RestoController@add');

    Route::get('/delete/{id}', 'RestoController@delete');

    Route::get('/edit/{id}', 'RestoController@edit');
    Route::post('edit', 'RestoController@update');

    Route::post('/search', 'RestoController@search');
});