<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class SachAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $cur_page = 0;
        if(isset($_GET['page'])){
            $cur_page = $_GET['page'];
        }

        $number_on_trang = 10;

        $so_trang = 0;

        $result = DB::table('bs_sach')
        ->select(DB::raw('COUNT(*) as tong_so_sach'))
        ->where('trang_thai', '!=', '-1')
        ->first();

        $so_trang = ceil($result->tong_so_sach / $number_on_trang);

        $ds_sach = DB::table('bs_sach')
            ->orderBy('id', 'DESC')
            ->where('trang_thai', '!=', '-1')
            ->skip($cur_page * $number_on_trang)
            ->limit($number_on_trang)->get();

        return view('page_admin.trang_ds_sach')
            ->with('ds_sach', $ds_sach)
            ->with('so_trang', $so_trang)
            ->with('cur_page', $cur_page);
    }

    function index_trash(){
        $cur_page = 0;
        if(isset($_GET['page'])){
            $cur_page = $_GET['page'];
        }

        $number_on_trang = 10;

        $so_trang = 0;

        $result = DB::table('bs_sach')
        ->select(DB::raw('COUNT(*) as tong_so_sach'))
        ->where('trang_thai', '=', '-1')
        ->first();

        $so_trang = ceil($result->tong_so_sach / $number_on_trang);

        $ds_sach = DB::table('bs_sach')
            ->orderBy('id', 'DESC')
            ->where('trang_thai', '=', '-1')
            ->skip($cur_page * $number_on_trang)
            ->limit($number_on_trang)->get();

        return view('page_admin.trang_ds_sach_trong_thung_rac')
            ->with('ds_sach', $ds_sach)
            ->with('so_trang', $so_trang)
            ->with('cur_page', $cur_page);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ds_tac_gia = DB::table('bs_tac_gia')->get();
        $ds_nxb = DB::table('bs_nha_xuat_ban')->get();
        $ds_loai_sach = DB::table('bs_loai_sach')->get();
        
        return view('page_admin.trang_them_sach')
            ->with('ds_tac_gia', $ds_tac_gia)
            ->with('ds_nxb', $ds_nxb)
            ->with('ds_loai_sach', $ds_loai_sach);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sku = $request->get('sku');
        $ten_sach = $request->get('ten_sach');
        $doc_thu = $request->get('doc_thu');
        $so_trang = $request->get('so_trang');
        $ngay_xuat_ban = $request->get('ngay_xuat_ban');
        $kich_thuoc = $request->get('kich_thuoc');
        $trong_luong = $request->get('trong_luong');
        $don_gia = $request->get('don_gia');
        $gia_bia = $request->get('gia_bia');
        $id_tac_gia = $request->get('id_tac_gia');
        $id_loai_sach = $request->get('id_loai_sach');
        $id_nha_xuat_ban = $request->get('id_nha_xuat_ban');
        $trang_thai = $request->get('trang_thai');
        $noi_bat = $request->get('noi_bat');
        $gioi_thieu = $request->get('gioi_thieu');

        if($request->hasFile('hinh')){
            $files = $request->file('hinh');

            $cur_time = microtime();

            if($files->isValid()){
                //echo public_path() . '/images/';
                $hinh = $cur_time . '_' . $files->getClientOriginalName();
                $files->move(public_path(). '/images/sach/', $hinh);
            }
        }

        DB::table('bs_sach')
            ->insert([
                'sku' => $sku,
                'ten_sach' => $ten_sach,
                'doc_thu' => $doc_thu,
                'so_trang' => $so_trang,
                'ngay_xuat_ban' => $ngay_xuat_ban,
                'kich_thuoc' => $kich_thuoc,
                'trong_luong' => $trong_luong,
                'don_gia' => $don_gia,
                'gia_bia' => $gia_bia,
                'id_tac_gia' => $id_tac_gia,
                'id_loai_sach' => $id_loai_sach,
                'id_nha_xuat_ban' => $id_nha_xuat_ban,
                'trang_thai' => $trang_thai,
                'noi_bat' => $noi_bat,
                'gioi_thieu' => $gioi_thieu,
                'hinh' => $hinh
            ]);
        //
        return redirect('/admin/ql-sach/')->with('NoticeSuccess', 'Tạo sách mới thành công');
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
        $ds_tac_gia = DB::table('bs_tac_gia')->get();
        $ds_nxb = DB::table('bs_nha_xuat_ban')->get();
        $ds_loai_sach = DB::table('bs_loai_sach')->get();

        $thong_tin_sach = DB::table('bs_sach')->where('id', $id)->first();
        return view('page_admin.trang_cap_nhat_sach')
            ->with('thong_tin_sach', $thong_tin_sach)
            ->with('ds_tac_gia', $ds_tac_gia)
            ->with('ds_nxb', $ds_nxb)
            ->with('ds_loai_sach', $ds_loai_sach);
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
        $sku = $request->get('sku');
        $ten_sach = $request->get('ten_sach');
        $doc_thu = $request->get('doc_thu');
        $so_trang = $request->get('so_trang');
        $ngay_xuat_ban = $request->get('ngay_xuat_ban');
        $kich_thuoc = $request->get('kich_thuoc');
        $trong_luong = $request->get('trong_luong');
        $don_gia = $request->get('don_gia');
        $gia_bia = $request->get('gia_bia');
        $id_tac_gia = $request->get('id_tac_gia');
        $id_loai_sach = $request->get('id_loai_sach');
        $id_nha_xuat_ban = $request->get('id_nha_xuat_ban');
        $trang_thai = $request->get('trang_thai');
        $noi_bat = $request->get('noi_bat');
        $gioi_thieu = $request->get('gioi_thieu');

        $hinh = $request->get('hinh_tam');
        if($request->hasFile('hinh')){
            $files = $request->file('hinh');

            $cur_time = microtime();

            if($files->isValid()){
                //echo public_path() . '/images/';
                $hinh = $cur_time . '_' . $files->getClientOriginalName();
                $files->move(public_path(). '/images/sach/', $hinh);
            }
        }

        DB::table('bs_sach')
            ->where('id', $id)
            ->update([
                'sku' => $sku,
                'ten_sach' => $ten_sach,
                'doc_thu' => $doc_thu,
                'so_trang' => $so_trang,
                'ngay_xuat_ban' => $ngay_xuat_ban,
                'kich_thuoc' => $kich_thuoc,
                'trong_luong' => $trong_luong,
                'don_gia' => $don_gia,
                'gia_bia' => $gia_bia,
                'id_tac_gia' => $id_tac_gia,
                'id_loai_sach' => $id_loai_sach,
                'id_nha_xuat_ban' => $id_nha_xuat_ban,
                'trang_thai' => $trang_thai,
                'noi_bat' => $noi_bat,
                'gioi_thieu' => $gioi_thieu,
                'hinh' => $hinh
            ]);
        //
        return redirect('/admin/ql-sach/edit/' . $id)->with('NoticeSuccess', 'sửa thông tin sách thành công');
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
        //echo $id;
        //DB::delete
        $trang_thai = -1;

        DB::table('bs_sach')
        ->where('id', $id)
        ->update([
            'trang_thai' => $trang_thai
        ]);

        return redirect('/admin/ql-sach/')->with('NoticeSuccess', 'Đã đưa Sách vào thùng rác thành công');
    }

    public function delete($id){
        DB::table('bs_sach')
        ->where('id', $id)
        ->delete();

        return redirect('/admin/ql-sach/thung-rac')->with('NoticeSuccess', 'Đã xóa hẳn sách khỏi database');
    }

    public function refresh($id){
        $trang_thai = 0;

        DB::table('bs_sach')
        ->where('id', $id)
        ->update([
            'trang_thai' => $trang_thai
        ]);

        return redirect('/admin/ql-sach/thung-rac')->with('NoticeSuccess', 'Sách đã được khôi phục');
    }

    public function load_per_page($page){
        //echo $page;
        $number_on_trang = 10;
        
        $ds_sach = DB::table('bs_sach')
            ->where('trang_thai', '!=', '-1')
            ->orderBy('id', 'DESC')
            ->skip($page * $number_on_trang)
            ->limit($number_on_trang)->get();

        return response()->json($ds_sach);
    }

    public function load_per_page_thung_rac($page){
        $number_on_trang = 10;
        
        $ds_sach = DB::table('bs_sach')
            ->where('trang_thai', '=', '-1')
            ->orderBy('id', 'DESC')
            ->skip($page * $number_on_trang)
            ->limit($number_on_trang)->get();

        return response()->json($ds_sach);
    }
}
