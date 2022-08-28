<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureAdminRole;

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

Route::get('/', 'App\Http\Controllers\NormalController@index');

Route::get('/sach/{id_sach}', 'App\Http\Controllers\SachController@show');


Route::get('/trang-chao', function () {
    return view('trang_chao');
});

Route::get('/test-1', 'App\Http\Controllers\test_controller@test_1');

Route::post('/test-2', 'App\Http\Controllers\test_controller@test_2');

Route::resource('/test-resource', App\Http\Controllers\TestResourceController::class);

// Route::get('thu-nghiem/{id_user}', function ($id_user) {
//     return view('thu_nghiem')->with('id_user', $id_user);
// });

Route::get('thu-nghiem/{id_user}', 'App\Http\Controllers\test_controller@xu_ly_truyen_bien');

Route::get('/danh-sach-user', 'App\Http\Controllers\test_controller@danh_sach_user');

Route::get('/lien-he', 'App\Http\Controllers\NormalController@trang_lien_he');

Route::post('/lien-he', [
    'as' => 'save_lien_he',
    'uses' => 'App\Http\Controllers\NormalController@save_lien_he'
]);


Route::get('/upload', 'App\Http\Controllers\NormalController@upload_file_view');

Route::post('/upload', [
    'as' => 'upload_file',
    'uses' => 'App\Http\Controllers\NormalController@upload_file'
]);

Route::post('/upload_multi', [
    'as' => 'upload_multi_file',
    'uses' => 'App\Http\Controllers\NormalController@upload_multi_file'
]);

Route::post('/login', [
    'as' => 'login',
    'uses' => 'App\Http\Controllers\UserController@login'
]);

Route::get('logout', 'App\Http\Controllers\UserController@logout');

Route::get('/danh-sach-sach', 'App\Http\Controllers\SachController@index');

Route::get('/dang-ky', 'App\Http\Controllers\UserController@create');

Route::post('/dang-ky', [
    'as' => 'dang_ky_post',
    'uses' => 'App\Http\Controllers\UserController@store'
]);

Route::get('/sach-theo-loai/{id_loai_sach}', 'App\Http\Controllers\SachController@sach_theo_loai');

Route::get('/tin-tuc', 'App\Http\Controllers\TinTucController@index');

Route::post('/cart', 'App\Http\Controllers\CartController@store');

Route::put('/cart/{id}', 'App\Http\Controllers\CartController@update');

Route::delete('/cart/{id}', 'App\Http\Controllers\CartController@destroy');

Route::delete('/cart', 'App\Http\Controllers\CartController@destroy_cart');

Route::get('/gio-hang', 'App\Http\Controllers\CartController@index');

Route::get('/thanh-toan', 'App\Http\Controllers\OrderController@index');

Route::post('/thanh-toan', 'App\Http\Controllers\OrderController@store');


/* Route for Admin Page */

Route::get('/admin', 'App\Http\Controllers\AdminController@index')->middleware(EnsureAdminRole::class);

Route::get('/admin/login', 'App\Http\Controllers\AdminController@login');