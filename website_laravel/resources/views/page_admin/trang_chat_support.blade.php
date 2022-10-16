@extends('templates.template_admin')

@section('main-content')

    <script src="/assets/highchart/highcharts.js"></script>
    <script src="/assets/highchart/highcharts-3d.js"></script>
    <script src="/assets/highchart/exporting.js"></script>
    <script src="/assets/highchart/export-data.js"></script>
    <script src="/assets/highchart/accessibility.js"></script>

    <!--overview start-->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Chat Support</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-laptop"></i> Chat Support</li>						  	
            </ol>
        </div>
    </div>
    
    <div class="container_chat_support" id="container_chat_support">
        @csrf


    </div>

    <script>
        var user_email_self = "{{session('user_info')->email}}";
        var user_name = "{{session('user_info')->ho_ten}}";
        var user_id_self = "{{session('user_info')->id}}";

        var list_element_message = [];

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('e836754de27fb45a4173', {
            cluster: 'mt1'
        });

        var channel = pusher.subscribe('my-channel');

        channel.bind('create-room', function(data) {
            //console.log((JSON.stringify(data)));
            // var html_form = `
            // <div class="include_all form_chat_${data.user_id}">
            //     <div class="title_mod_chat">
            //         Chat với ${data.user_email} - ${data.user_name}
            //     </div>
            //     <div class="form_chat_container">
            //         <div class="form_chat">
            //             <div class="list_message_chat" id="list_message_${data.user_id}">
            //             </div>
            //         </div>
            //         <div class="include_button_input">
            //             <div class="include_input">
            //                 <input type="text" onkeyup="process_keyup(event, '${data.user_id}', '${data.user_email}')" class="form-control chat_message" name="chat_message">
            //             </div>
            //             <div class="include_button">
            //                 <button onclick="send_message_chat('${data.user_id}', '${data.user_email}')" class="btn btn-primary btn_send_chat">Send</button>
            //             </div>
            //         </div>
            //     </div>
                
            // </div>
            // `;

            var element_title = document.createElement('div');
            element_title.classList.add("title_mod_chat");
            element_title.innerHTML = `Chat với ${data.user_email} - ${data.user_name}`;

            var element_list_message_chat = document.createElement('div');
            element_list_message_chat.setAttribute('id', `list_message_${data.user_id}`);
            list_element_message[data.user_id] = element_list_message_chat;

            var element_form_chat = document.createElement('div');
            element_form_chat.classList.add('form_chat');
            element_form_chat.appendChild(element_list_message_chat);


            var element_include_button_input = document.createElement('div');
            element_include_button_input.classList.add('include_button_input');
            element_include_button_input.innerHTML =  `
                <div class="include_input">
                    <input type="text" onkeyup="process_keyup(event, '${data.user_id}', '${data.user_email}')" class="form-control chat_message" name="chat_message">
                </div>
                <div class="include_button">
                    <button onclick="send_message_chat('${data.user_id}', '${data.user_email}')" class="btn btn-primary btn_send_chat">Send</button>
                </div>
            `

            var element_form_chat_container = document.createElement('div');
            element_form_chat_container.classList.add('form_chat_container');
            element_form_chat_container.appendChild(element_form_chat);
            element_form_chat_container.appendChild(element_include_button_input);


            var element_include_all = document.createElement('div');
            element_include_all.classList.add(`form_chat_${data.user_id}`);

            element_include_all.appendChild(element_title);
            element_include_all.appendChild(element_form_chat_container);

            document.getElementById('container_chat_support').appendChild(element_include_all);

            
            channel.bind(data.user_email, function(data) {
                console.log((JSON.stringify(data)));
                
                var class_self = '';
                var subhtml = '';
                if(data.user_email == user_email_self){
                    class_self = ' myself'
                }
                else {
                    //subhtml = `<div class="ho_ten_nguoi_chat">${data.user_name}</div>`
                }

                var html = list_element_message[data.user_id].innerHTML + `
                <div class="item_chat ${class_self}">
                    ${data.message}
                </div>
                `;

                //console.log(html);
                
                //$($(`.form_chat_${data.user_id} .list_message_chat`)[0]).html(html);
                list_element_message[data.user_id].innerHTML = html;
                

                //$(`.form_chat_${data.user_id} .form_chat`).scrollTop($(`.form_chat_${data.user_id} .list_message_chat`)[0].scrollHeight);
            });

            //$('.container_chat_support').append(html_form);
        });

        function process_keyup(e, user_id, user_email){
            if(e.keyCode == 13){
                send_message_chat(user_id, user_email);
            }
        }

        function send_message_chat(user_id, user_email){
            //console.log('chay send message');

            //console.log($('input[name="_token"]').val());
            var token = $('input[name="_token"]').val();
            var message = $(`.form_chat_${user_id} .chat_message`).val();
            //console.log(token, message, `.form_chat_${user_id} .chat_message`);

            if(message){
                
                $.post('/admin-chat', {
                    'message': message,
                    'user_email_self': user_email_self,
                    'user_name': user_name,
                    'user_id': user_id,
                    'user_email': user_email,
                    '_token': token
                })
                .done((result) => {
                    //console.log(result);
                    $(`.form_chat_${user_id} .chat_message`).val('');
                });
                
            }
            
        }
    </script>
</div> 
<!-- project team & activity end -->
@stop