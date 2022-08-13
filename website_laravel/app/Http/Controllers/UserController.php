<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Cookie;
use DB;

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

    public function create(){
        return view('trang_dang_ky');
    }

    public function store(Request $request){
        $ho_ten = $request->get('ho_ten');
        $tai_khoan = $request->get('tai_khoan');
        $email = $request->get('email');
        $mat_khau = $request->get('mat_khau');
        $re_mat_khau = $request->get('re_mat_khau');
        $ngay_sinh = $request->get('ngay_sinh');
        $dien_thoai = $request->get('dien_thoai');
        $dia_chi = $request->get('dia_chi');

        if($mat_khau === $re_mat_khau){
            $id_user = DB::table('bs_nguoi_dung')->insertGetId([
                'ho_ten' => $ho_ten,
                'tai_khoan' => $tai_khoan,
                'email' => $email,
                'mat_khau' => $mat_khau,
                'ngay_sinh' => $ngay_sinh,
                'dien_thoai' => $dien_thoai,
                'dia_chi' => $dia_chi,
            ]);

            $user_info = ['ten_dang_nhap' => $tai_khoan, 'ho_ten' => $ho_ten];
            //Session::put('user_info', $user_info);
            $cookie = Cookie::make('user_info', json_encode($user_info), 24 * 60);
            return redirect('/')->withCookie($cookie);
        }
        else {
            return redirect($_SERVER['HTTP_REFERER']);
        }
        
    }
}
