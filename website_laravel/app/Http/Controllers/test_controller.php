<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class test_controller extends Controller
{
    //
    function test_1(){
        echo 'Thử xem sao';
    }

    function test_2(){
        echo 'Thử nghiệm POST';
    }

    function xu_ly_truyen_bien($id_user){
        //echo $id_user;
        $data_string = file_get_contents(resource_path() . '/datatemp/user.json');
        //echo $data_string;
        $list_user = json_decode($data_string);
        //echo '<pre>',print_r($list_user),'</pre>';
        $user_current = '';
        $flag = 0;
        foreach($list_user as $user){
            if($user->id == $id_user){
                $user_current = $user;
                $flag = 1;
            }
        }

        if($flag == 0){
            return view('thu_nghiem')
                ->with('status_info', 0);
        }
        else{
            return view('thu_nghiem')
                ->with('user_info', $user_current)
                ->with('status_info', 1);
        }
        
    }

    function danh_sach_user(){
        $data_string = file_get_contents(resource_path() . '/datatemp/user.json');
        //echo $data_string;
        $list_user = json_decode($data_string);//json_decode($data_string);
        //echo '<pre>',print_r($list_user),'</pre>';

        return view('danh_sach_user')->with('list_user', $list_user);
    }
}
