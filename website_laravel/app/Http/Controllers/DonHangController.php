<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function review($email){
        //echo $email;

        $ds_don_hang = DB::table('bs_don_hang')
        ->where('email_nguoi_nhan', $email)
        ->limit(10)
        ->get();

        foreach($ds_don_hang as $don_hang){
            $ds_sp = DB::table('bs_chi_tiet_don_hang')
            ->join('bs_sach', 'bs_chi_tiet_don_hang.id_sach', '=', 'bs_sach.id')
            ->where('id_don_hang', $don_hang->id)
            ->get();

            $don_hang->ds_sp = $ds_sp;
        }

        //echo '<pre>',print_r($ds_don_hang),'</pre>';
        return view('trang_ds_don_hang')->with('ds_don_hang', $ds_don_hang);
    }

    public function index($email, $page)
    {
        //
        $item_on_page = 10;

        $ds_don_hang = DB::table('bs_don_hang')
        ->where('email_nguoi_nhan', $email)
        ->skip((Int) $page * $item_on_page)
        ->limit($item_on_page)
        ->get();

        foreach($ds_don_hang as $don_hang){
            $ds_sp = DB::table('bs_chi_tiet_don_hang')
            ->join('bs_sach', 'bs_chi_tiet_don_hang.id_sach', '=', 'bs_sach.id')
            ->where('id_don_hang', $don_hang->id)
            ->get();

            $don_hang->ds_sp = $ds_sp;
        }

        return response()->json($ds_don_hang, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generate(){
        set_time_limit(3000);

        if(isset($_GET['nam'])){
            $nam = $_GET['nam'];
            // $array_ngay = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28];
            // $array_month = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

            $ds_user = DB::table('bs_nguoi_dung')->get();

            $ds_sach = DB::table('bs_sach')->get();

            for($m = 1; $m <= 12; $m++){
                for($n = 1; $n <= 28; $n++){
                    //echo $random_user;
                    $ngay_dat = "$nam-$m-$n 00:00:00";
                    $random_number_sp = rand(5,30);
                    
                    for($j = 0; $j <= $random_number_sp; $j++){
                        $tong_tien = 0;
                        $mang_sp_gio_hang = [];

                        $random_user = rand(0, count($ds_user) - 1);
                        $user_duoc_chon = $ds_user[$random_user];

                        for($i = 0; $i < $random_number_sp; $i++){
                            $random_sach = rand(0, count($ds_sach) - 1);
                            $sach_duoc_chon = $ds_sach[$random_sach];
                
                            $tong_tien += $sach_duoc_chon->don_gia * 1;
                
                            $flag = 0;
                            foreach($mang_sp_gio_hang as $item_gio_hang){
                                if($item_gio_hang->id == $sach_duoc_chon->id){
                                    $item_gio_hang->so_luong += 1;
                                    $flag = 1;
                                    break;
                                }
                            }
                
                            if($flag == 0){
                                $sach_duoc_chon->so_luong = 1;
                                $mang_sp_gio_hang[] = $sach_duoc_chon;
                            }
                        }
                
                        //echo '<pre>',print_r($user_duoc_chon),'</pre>';
                
                        $id_don_hang = DB::table('bs_don_hang')
                            ->insertGetId([
                                'ho_ten_nguoi_nhan' => $user_duoc_chon->ho_ten,
                                'email_nguoi_nhan' => $user_duoc_chon->email,
                                'so_dien_thoai_nguoi_nhan' => $user_duoc_chon->dien_thoai,
                                'dia_chi_nguoi_nhan' => $user_duoc_chon->dia_chi,
                                'tong_tien' => $tong_tien,
                                'ngay_dat' => $ngay_dat,
                                'trang_thai' => 2
                            ]);
                
                        foreach($mang_sp_gio_hang as $item_gio_hang){
                            DB::table('bs_chi_tiet_don_hang')
                            ->insertGetId([
                                'id_don_hang' => $id_don_hang,
                                'id_sach' => $item_gio_hang->id,
                                'so_luong' => $item_gio_hang->so_luong,
                                'don_gia' => $item_gio_hang->don_gia,
                                'thanh_tien' => $item_gio_hang->so_luong * $item_gio_hang->don_gia
                            ]);
                        }
                    }
                }
            }
            
            echo 'generate done';
        }
        else {
            echo 'bạn phải truyền năm để tôi generate';
        }
    }

    public function analytics_chart($year){

        $array_month = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $array_thong_ke = [];

        if($year >= 2016 && $year <= 2022){
            
            $result = DB::select("
            SELECT MONTH(ngay_dat) as thang, CONCAT(YEAR(ngay_dat), '-',MONTH(ngay_dat)), SUM(tong_tien) as tong_tien
            FROM bs_don_hang
            WHERE YEAR(ngay_dat) = $year
            GROUP BY CONCAT(YEAR(ngay_dat), '-',MONTH(ngay_dat))
            ORDER BY CONCAT(YEAR(ngay_dat), '-',MONTH(ngay_dat))
            ");
    
            for($i = 0; $i < 12; $i++){
                $kiem_tra = 0;
                foreach($result as $row){
                    if($array_month[$i] == $row->thang){
                        $array_thong_ke[] = $row->tong_tien * 1;
                        $kiem_tra = 1;
                    }
                }
    
                if($kiem_tra == 0){
                    $array_thong_ke[] = 0;
                }
            }
    
            //echo '<pre>',print_r($array_thong_ke),'</pre>';
        }
        
        return response()->json($array_thong_ke, 200);
    }
}
