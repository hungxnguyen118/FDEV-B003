<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureAdminRole;
use App\Http\Middleware\RuleSaveBook;
use App\Http\Middleware\UserRuleChecked;

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

Route::get('/test-chat', 'App\Http\Controllers\test_controller@test_chat');

Route::post('/test-chat', 'App\Http\Controllers\test_controller@send_message_to_Pusher');
Route::post('/admin-chat', 'App\Http\Controllers\test_controller@send_message_to_Pusher_via_admin');
Route::post('/create-room-chat', 'App\Http\Controllers\test_controller@create_room');

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

Route::get('/tai-khoan', 'App\Http\Controllers\UserController@thong_tin_tai_khoan');
Route::post('/tai-khoan', 'App\Http\Controllers\UserController@update_thong_tin_tai_khoan');

Route::get('/sach-theo-loai/{id_loai_sach}', 'App\Http\Controllers\SachController@sach_theo_loai');

Route::get('/tin-tuc', 'App\Http\Controllers\TinTucController@index');

Route::post('/cart', 'App\Http\Controllers\CartController@store');

Route::put('/cart/{id}', 'App\Http\Controllers\CartController@update');

Route::delete('/cart/{id}', 'App\Http\Controllers\CartController@destroy');

Route::delete('/cart', 'App\Http\Controllers\CartController@destroy_cart');

Route::get('/gio-hang', 'App\Http\Controllers\CartController@index');

Route::get('/thanh-toan', 'App\Http\Controllers\OrderController@index');

Route::post('/thanh-toan', 'App\Http\Controllers\OrderController@store');

Route::get('/don-hang/{email}', 'App\Http\Controllers\DonHangController@review');

Route::get('/don-hang/id/{id}', 'App\Http\Controllers\DonHangController@show')->middleware([UserRuleChecked::class]);

Route::get('/api/don-hang/{email}/{page}', 'App\Http\Controllers\DonHangController@index');

Route::post('/api/don-hang/trang-thai/{id}', 'App\Http\Controllers\DonHangController@update_trang_thai');

Route::get('/api/don-hang/notice', 'App\Http\Controllers\DonHangController@notice' );


/* Route for Admin Page */

Route::get('/admin', 'App\Http\Controllers\AdminController@index')->middleware(EnsureAdminRole::class);

Route::get('/admin/login', 'App\Http\Controllers\AdminController@login');

/* Route QL Sách */
Route::get('/admin/ql-sach/', 'App\Http\Controllers\SachAdminController@index')->middleware(EnsureAdminRole::class);

Route::get('/admin/ql-sach/pagination/{page}', 'App\Http\Controllers\SachAdminController@load_per_page');
Route::get('/admin/ql-sach/thung-rac/pagination/{page}', 'App\Http\Controllers\SachAdminController@load_per_page_thung_rac');

Route::get('/admin/ql-sach/create', 'App\Http\Controllers\SachAdminController@create')->middleware(EnsureAdminRole::class);
Route::post('/admin/ql-sach/create', 'App\Http\Controllers\SachAdminController@store')->middleware([EnsureAdminRole::class, RuleSaveBook::class]);

Route::get('/admin/ql-sach/edit/{id}', 'App\Http\Controllers\SachAdminController@edit')->middleware(EnsureAdminRole::class);
Route::post('/admin/ql-sach/edit/{id}', 'App\Http\Controllers\SachAdminController@update')->middleware([EnsureAdminRole::class]);

Route::get('/admin/ql-sach/delete/{id}', 'App\Http\Controllers\SachAdminController@destroy')->middleware([EnsureAdminRole::class]);
Route::get('/admin/ql-sach/thung-rac', 'App\Http\Controllers\SachAdminController@index_trash')->middleware([EnsureAdminRole::class]);
Route::get('/admin/ql-sach/thung-rac/delete/{id}', 'App\Http\Controllers\SachAdminController@delete')->middleware([EnsureAdminRole::class]);
Route::get('/admin/ql-sach/thung-rac/refresh{id}', 'App\Http\Controllers\SachAdminController@refresh')->middleware([EnsureAdminRole::class]);

Route::get('/admin/ql-don-hang', 'App\Http\Controllers\DonHangAdminController@index')->middleware([EnsureAdminRole::class]);
Route::get('/admin/ql-don-hang/pagination/{page}', 'App\Http\Controllers\DonHangAdminController@load_per_page');

Route::get('/admin/chat-support', 'App\Http\Controllers\ChatAdminController@index')->middleware([EnsureAdminRole::class]);


/* generate data */
Route::get('/admin/generate-data', 'App\Http\Controllers\DonHangController@generate');
Route::get('/admin/api-chart/{year}', 'App\Http\Controllers\DonHangController@analytics_chart');