<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_loai_sach = isset($_GET['id_loai_sach'])?$_GET['id_loai_sach']:'';
        $search = isset($_GET['search'])?$_GET['search']:'';

        $ds_loai_sach = DB::table('bs_loai_sach')->get();

        //
        $ds_sach = DB::table('bs_sach')
        ->select('bs_sach.id','hinh', 'ten_sach', 'don_gia', 'gia_bia', 'ten_tac_gia')
        ->join('bs_tac_gia', 'bs_sach.id_tac_gia', '=', 'bs_tac_gia.id')
        ->where('id_loai_sach', $id_loai_sach)
        ->where('ten_sach', 'LIKE', "%$search%")
        ->get();
        //echo '<pre>',print_r($ds_sach),'</pre>';
        return view('ds_sach')
            ->with('ds_sach', $ds_sach)
            ->with('ds_loai_sach', $ds_loai_sach)
            ->with('id_loai_sach', $id_loai_sach)
            ->with('search', $search);
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
    public function show($id_sach)
    {
        //
        //echo $id_sach;
        $thong_tin_sach = DB::select('SELECT * 
            FROM bs_sach s JOIN bs_tac_gia tg ON s.id_tac_gia = tg.id 
            WHERE s.id = ?', [$id_sach]);
        echo '<pre>',print_r($thong_tin_sach),'</pre>';

        return view('trang_chi_tiet_sach');
        //return '123';
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
