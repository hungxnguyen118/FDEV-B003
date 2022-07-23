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
    //return '123';
});

Route::get('/trang-chao', function () {
    return view('trang_chao');
});

Route::get('/test-1', 'App\Http\Controllers\test_controller@test_1');

Route::post('/test-2', 'App\Http\Controllers\test_controller@test_2');

Route::resource('/test-resource', App\Http\Controllers\TestResourceController::class);