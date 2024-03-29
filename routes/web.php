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


Route::get('/', 'RestoController@homeList');



Route::get('register', 'UserController@register');
Route::post('/register', 'UserController@registerUser');

Route::get('login', 'UserController@login');
Route::post('/login', 'UserController@loginUser');



// Middleware
Route::group(['middleware' => ['protectedPage']], function(){
    
    Route::get('list', 'RestoController@list');

    Route::view('add', 'addResto');
    Route::post('/add', 'RestoController@add');

    Route::get('/delete/{id}', 'RestoController@delete');

    Route::get('/edit/{id}', 'RestoController@edit');
    Route::post('edit', 'RestoController@update');

    Route::post('/search', 'RestoController@search');

    Route::get('logout', 'UserController@logout');



    //Employee Routes
    Route::get('/add_emp', 'EmployeeController@index');
    Route::post('/add_emp', 'EmployeeController@create');

    Route::get('/list_emp', 'EmployeeController@show');

    Route::get('/emp_edit/{id}', 'EmployeeController@edit');
    Route::post('emp_edit', 'EmployeeController@update');

    Route::get('/emp_delete/{id}', 'EmployeeController@destroy' );

    //Practice Connection 
    Route::get('/practice_conn', 'EmployeeController@practice_conn');

});