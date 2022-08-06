<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function login(Request $request){
        $ten_dang_nhap = $request->get('ten_dang_nhap');
        $mat_khau = $request->get('mat_khau');

        //echo $ten_dang_nhap . ' - ' . $mat_khau;
        if($ten_dang_nhap == 'hungnguyen' && $mat_khau == '123456'){
            Session::put('user_info', ['ten_dang_nhap' => $ten_dang_nhap, 'ho_ten' => 'Hùng Nguyễn']);
            return redirect($_SERVER['HTTP_REFERER']);
        }
        else {
            return redirect($_SERVER['HTTP_REFERER'])->with('login_error', 'Tài khoản hoặc mật khẩu không đúng');
        }

    }

    public function logout(){
        Session::forget('user_info');
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
