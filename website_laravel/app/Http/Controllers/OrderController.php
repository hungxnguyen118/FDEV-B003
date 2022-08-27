<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Support\Facades\Session;

use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo '123';

        return view('trang_thanh_toan')->with('thanh_toan', 1);
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
    public function store(OrderRequest $request)
    {
        //
        $ho_ten = $request->get('ho_ten');
        $email = $request->get('email');
        $dien_thoai = $request->get('dien_thoai');
        $dia_chi = $request->get('dia_chi');

        DB::transaction(function () use($ho_ten, $email, $dien_thoai, $dia_chi) {
            $id_don_hang = DB::table('bs_don_hang')
            ->insertGetId([
                'ho_ten_nguoi_nhan' => $ho_ten,
                'email_nguoi_nhan' => $email,
                'so_dien_thoai_nguoi_nhan' => $dien_thoai,
                'dia_chi_nguoi_nhan' => $dia_chi,
                'tong_tien' => Session::get('tong_tien'),
                'ngay_dat' => date('Y-m-d H:i:s'),
                'trang_thai' => 2
            ]);

            if(Session::has('gio_hang')){
                $gio_hang = Session::get('gio_hang');
                foreach($gio_hang as $item_gio_hang){
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

            //echo $id_don_hang;
        });

        Session::forget('gio_hang');
        Session::forget('tong_so_luong');
        Session::forget('tong_tien');

        return redirect('/')->with('NoticeSuccess', 'Đặt hàng thành công!');
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
