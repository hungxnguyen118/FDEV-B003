<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('trang_gio_hang')->with('thanh_toan', 0);
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
        $id_sach = $request->get('id_sach');
        //echo $id_sach;

        $thong_tin_sach = DB::table('bs_sach')
        ->where('id', $id_sach)
        ->first();

        $thong_tin_sach = json_decode(json_encode($thong_tin_sach));
        //echo '<pre>',print_r($thong_tin_sach),'</pre>';

        $tong_so_luong = 0;

        $gio_hang = [];
        if(Session::has('gio_hang')){
            $gio_hang = Session::get('gio_hang');

            $flag = 0;
            foreach($gio_hang as $item_gio_hang){
                if($item_gio_hang->id == $id_sach){
                    $item_gio_hang->so_luong += 1;
                    $flag = 1;
                    break;
                }
            }

            if($flag == 0){
                $thong_tin_sach->so_luong = 1;
                $gio_hang[] = $thong_tin_sach;
            }

            Session::put('gio_hang', $gio_hang);
        }
        else{
            $thong_tin_sach->so_luong = 1;
            $gio_hang[] = $thong_tin_sach;

            Session::put('gio_hang', $gio_hang);
        }

        foreach($gio_hang as $item){
            $tong_so_luong += $item->so_luong;
        }

        Session::put('tong_so_luong', $tong_so_luong);
        $this->tinh_tong_tien_gio_hang();

        //echo '<pre>',print_r($gio_hang),'</pre>';
        return response()->json($gio_hang);
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
        //echo $id . ' - ' . $request->get('so_luong');
        $so_luong = $request->get('so_luong');
        $tong_so_luong = 0;
        $gio_hang = [];
        if(Session::has('gio_hang')){
            $gio_hang = Session::get('gio_hang');
            foreach($gio_hang as $item_gio_hang){
                if($item_gio_hang->id == $id){
                    $item_gio_hang->so_luong = $so_luong;
                    break;
                }
            }
            Session::put('gio_hang', $gio_hang);
            foreach($gio_hang as $item){
                $tong_so_luong += $item->so_luong;
            }
            Session::put('tong_so_luong', $tong_so_luong);
        }

        $this->tinh_tong_tien_gio_hang();

        return response()->json($gio_hang);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //echo $id;
        $tong_so_luong = 0;
        $gio_hang = [];
        if(Session::has('gio_hang')){
            $gio_hang = Session::get('gio_hang');
            foreach($gio_hang as $key => $item_gio_hang){
                if($item_gio_hang->id == $id){
                    array_splice($gio_hang, $key, 1);
                    break;
                }
            }
            Session::put('gio_hang', $gio_hang);

            foreach($gio_hang as $item){
                $tong_so_luong += $item->so_luong;
            }
            Session::put('tong_so_luong', $tong_so_luong);
        }

        $this->tinh_tong_tien_gio_hang();
        return response()->json($gio_hang);
    }

    function destroy_cart(){
        Session::forget('gio_hang');
        Session::forget('tong_so_luong');
        Session::forget('tong_tien');
        echo '1';
    }

    function tinh_tong_tien_gio_hang(){
        $tong_tien = 0;
        if(Session::has('gio_hang')){
            $gio_hang = Session::get('gio_hang');
            foreach($gio_hang as $item_gio_hang){
                $tong_tien += $item_gio_hang->don_gia * $item_gio_hang->so_luong;
            }
        }

        Session::put('tong_tien', $tong_tien);
    }
}
