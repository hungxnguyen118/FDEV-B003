<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Cookie;

class UserController extends Controller
{
    //
    public function login(Request $request){
        $ten_dang_nhap = $request->get('ten_dang_nhap');
        $mat_khau = $request->get('mat_khau');

        //echo $ten_dang_nhap . ' - ' . $mat_khau;
        if($ten_dang_nhap == 'hungnguyen' && $mat_khau == '123456'){
            $user_info = ['ten_dang_nhap' => $ten_dang_nhap, 'ho_ten' => 'Hùng Nguyễn'];
            //Session::put('user_info', $user_info);
            $cookie = Cookie::make('user_info', json_encode($user_info), 24 * 60);
            return redirect($_SERVER['HTTP_REFERER'])->withCookie($cookie);
        }
        else {
            return redirect($_SERVER['HTTP_REFERER'])->with('login_error', 'Tài khoản hoặc mật khẩu không đúng');
        }

    }

    public function logout(){
        Session::forget('user_info');
        $cookie = Cookie::make('user_info', '', 0);
        return redirect($_SERVER['HTTP_REFERER'])->withCookie($cookie);
    }
}
