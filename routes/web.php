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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware(rolecheck::class);
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::middleware('AdministratorCheck')->group(function(){
   Route::get('/administrator/dashboard', 'Controllers\AdministratorController@dashboard');
   Route::get('/administrator/user', 'Controllers\MemberController@member_list')->name('user');

});
