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

        $result = DB::table('bs_sach')->select(DB::raw('COUNT(*) as tong_so_sach'))->first();

        $so_trang = ceil($result->tong_so_sach / $number_on_trang);

        $ds_sach = DB::table('bs_sach')
            ->orderBy('id', 'DESC')
            ->skip($cur_page * $number_on_trang)
            ->limit($number_on_trang)->get();

        return view('page_admin.trang_ds_sach')
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

    public function load_per_page($page){
        //echo $page;
        $number_on_trang = 10;
        
        $ds_sach = DB::table('bs_sach')
            ->orderBy('id', 'DESC')
            ->skip($page * $number_on_trang)
            ->limit($number_on_trang)->get();

        return response()->json($ds_sach);
    }
}
