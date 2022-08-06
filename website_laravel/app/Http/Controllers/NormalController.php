<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LienHeRequest;

class NormalController extends Controller
{
    //
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
