<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use DB;

class RuleSaveBook
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
        $sku = $request->get('sku');
        $ngay_xuat_ban = $request->get('ngay_xuat_ban');
        $don_gia = $request->get('don_gia');
        $gia_bia = $request->get('gia_bia');

        if($gia_bia < $don_gia){
            return redirect($_SERVER['HTTP_REFERER'])->with('NoticeError', 'Đơn giá không được phép lớn hơn Giá Bìa');
        }

        $result_kiem_tra_sku = DB::table('bs_sach')->select('id')->where('sku', $sku)->first();
        if($result_kiem_tra_sku)
        {
            return redirect($_SERVER['HTTP_REFERER'])->with('NoticeError', 'SKU đã tồn tại');
        }

        $result_kiem_tra_ngay = time() - strtotime($ngay_xuat_ban);
        //echo $result_kiem_tra_ngay;die();
        if($result_kiem_tra_ngay < 0){
            return redirect($_SERVER['HTTP_REFERER'])->with('NoticeError', 'Cái gì vậy? chưa tới ngày xuất bản mà có sách???');
        }

        return $next($request);
    }
}
