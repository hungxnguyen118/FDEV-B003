<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LienHeRequest;

use DB;

class NormalController extends Controller
{
    //
    function index(Request $request){
        $user_info = $request->cookie('user_info', '');
        //echo $user_info;
        $user_info = json_decode($user_info, true);
        //echo '<pre>',print_r($user_info),'</pre>';
        Session::put('user_info', $user_info);

        $ds_sach_noi_bat = DB::select('SELECT s.*, ten_tac_gia FROM bs_sach s JOIN bs_tac_gia tg ON s.id_tac_gia = tg.id  WHERE noi_bat = 1');
        //echo '<pre>',print_r($ds_dsach_noi_bat),'</pre>';

        return view('trang_chu')->with('ds_sach_noi_bat', $ds_sach_noi_bat);
        //return '123';
    }

    function trang_lien_he(){
        return view('trang_lien_he');
    }

    function save_lien_he(LienHeRequest $request){
        //echo 'have response';
        // if($request->fails()) {
        //     return Redirect::back()->withErrors($validator);
        // }
        //$validated = $request->validate();

        //echo '<pre>',print_r($request),'</pre>';

        // $title = $request->get('title');
        // $email = $request->get('email');
        // $content = $request->get('content');

        return view('trang_lien_he');
    }

    public function upload_file_view(){
        return view('trang_upload');
    }

    public function upload_file(Request $request){
        //return 123;
        
        if($request->hasFile('hinh')){
            $files = $request->file('hinh');
            //echo '<pre>',print_r($files),'</pre>';

            // echo $files->getSize() . '<br/>';
            // echo $files->getClientMimeType() . '<br/>';
            // echo $files->getMimeType() . '<br/>';
            // echo $files->getRealPath() . '<br/>';
            // echo $files->getClientOriginalName() . '<br/>';
            // echo $files->getClientOriginalExtension() . '<br/>';

            if($files->isValid()){
                //echo public_path() . '/images/';
                $files->move(public_path(). '/images/', $files->getClientOriginalName());
            }
        }
        echo 'upload file successfull';
    }

    public function upload_multi_file(Request $request){
        if($request->hasFile('hinh')){
            $files = $request->file('hinh');
            //echo '<pre>',print_r($files),'</pre>';

            for($i = 0; $i < count($files); $i++){
                if($files[$i]->isValid()){
                    $files[$i]->move(public_path(). '/images/', $files[$i]->getClientOriginalName());
                }
            }
        }

        echo 'upload multiple file successfull';
    }
}
