<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher;

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

    function test_chat(){
        return view('test_chat');
    }

    function send_message_to_Pusher(Request $request){
        $message = $request->get('message');
        $user_email = $request->get('user_email');
        $user_name = $request->get('user_name');

        $pusher = new Pusher\Pusher(
            "e836754de27fb45a4173",
            "aa9c27531fe9a73c107b",
            "233726",
            array(
                'cluster' => 'mt1', 
                'useTLS' => false
            )
        );

        $pusher->trigger('my-channel', $user_email, array(
            'message' => $message,
            'user_email' => $user_email,
            'user_name' => $user_name
        ));
    }

    function create_room(Request $request){
        $user_email = $request->get('user_email');

        $pusher = new Pusher\Pusher(
            "e836754de27fb45a4173",
            "aa9c27531fe9a73c107b",
            "233726",
            array(
                'cluster' => 'mt1', 
                'useTLS' => false
            )
        );

        $pusher->trigger('my-channel', 'create-room', array(
            'user_email' => $user_email,
        ));
    }
}
