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
    return view('trang_chu');
    //return '123';
});

Route::get('/sach/{id_sach}', function () {
    return view('trang_chi_tiet_sach');
    //return '123';
});


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