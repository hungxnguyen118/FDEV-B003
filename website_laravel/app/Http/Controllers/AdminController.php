<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo 'dashboard Page';
        // $ds_don_hang = DB::table('bs_don_hang')
        //     ->where('YEAR(ngay_dat)', 2016)
        //     ->get();

        $array_month = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $array_thong_ke = [];
        
        //foreach($array_month as $month){
            // $result = DB::select("SELECT SUM(tong_tien) as tong_tien 
            //     FROM bs_don_hang 
            //     WHERE YEAR(ngay_dat) = 2016
            //     AND MONTH(ngay_dat) = $month
            // ");

            //echo '<pre>',print_r($result),'</pre>';
            //echo 'month ' . $month . ' ' . $result[0]->tong_tien;
            //$array_thong_ke[] = $result[0]->tong_tien?$result[0]->tong_tien * 1:0;
        //}

        $result = DB::select("
        SELECT MONTH(ngay_dat) as thang, CONCAT(YEAR(ngay_dat), '-',MONTH(ngay_dat)), SUM(tong_tien) as tong_tien
        FROM bs_don_hang
        WHERE YEAR(ngay_dat) = 2016
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

        $string_array = json_encode($array_thong_ke);

        return view('page_admin.trang_dashboard')->with('string_array', $string_array);
    }

    public function login()
    {
        //echo 'login Page';
        return view('page_admin.trang_login');
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
}
