<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use DB;

class UserRuleChecked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id_don_hang = $request->route('id');
        //echo $id_don_hang;
        $thong_tin_don_hang = DB::table('bs_don_hang')
        ->where('id', $id_don_hang)
        ->first();

        $message = '';

        //echo '<pre>',print_r($thong_tin_don_hang),'</pre>';
        if(Session::has('user_info')){
            $user_info = Session::get('user_info');
            //echo '<pre>',print_r($user_info),'</pre>';

            if($thong_tin_don_hang->email_nguoi_nhan == $user_info->email){
                //echo 'cho vô';
                return $next($request);
            }
            else{
                //echo 'đuổi, ko đúng user';
                $message = 'Bạn không có quyền truy cập trang này';
            }
        }
        else{
            //echo 'đuổi, chưa đăng nhập';
            $message = 'Bạn chưa đăng nhập để xem chi tiết đơn hàng';
        }

        return redirect('/')->with('permission_error', $message);
    }
}
