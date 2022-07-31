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
}
