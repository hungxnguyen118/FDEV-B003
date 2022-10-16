@if(session('user_info'))
<div class="include_all">
    <div class="title_mod_chat" onclick="process_show_hide()">
        Chat nhé
    </div>
    <div class="form_chat_container">
        <div class="form_chat">
            <div class="list_message_chat">
            </div>
        </div>
        <div class="include_button_input">
            @csrf
            <div class="include_input">
                <input type="text" class="form-control" name="chat_message" id="chat_message">
            </div>
            <div class="include_button">
                <button class="btn btn-primary btn_send_chat">Send</button>
            </div>
        </div>
    </div>
    
</div>

<script>

    var user_email = "{{session('user_info')->email}}";
    var user_name = "{{session('user_info')->ho_ten}}";
    var user_id = "{{session('user_info')->id}}";
    var room_or_not = 0;

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('e836754de27fb45a4173', {
      cluster: 'mt1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind(user_email, function(data) {
        //alert(JSON.stringify(data));
        var class_self = '';
        var subhtml = '';
        if(data.user_email == user_email){
            class_self = ' myself'
        }
        else {
            subhtml = `<div class="ho_ten_nguoi_chat">${data.user_name}</div>`
        }

        var html = `
        <div class="item_chat ${class_self}">
            ${subhtml}
            ${data.message}
        </div>
        `;

        
        $('.list_message_chat').append(html);

        $('.form_chat').scrollTop($('.list_message_chat')[0].scrollHeight);
        
    });

    var show_hide_form = 0;
    function process_show_hide(){
        show_hide_form = 1 - show_hide_form;
        if(show_hide_form == 1){
            $('.include_all .form_chat_container').height(300);
        }
        else {
            $('.include_all .form_chat_container').height(0);
        }
    }

    function send_message_chat(){
        //console.log($('input[name="_token"]').val());
        var token = $('input[name="_token"]').val();
        var message = $('#chat_message').val();
        //console.log(token, message);

        if(message){
            if(room_or_not == 0){
                $.post('/create-room-chat', {
                    'user_email': user_email,
                    'user_name': user_name,
                    'user_id': user_id,
                    '_token': token
                })
                .done((result) => {
                    //console.log('success');
                    room_or_not = 1;
                    setTimeout(() => {
                        $.post('/test-chat', {
                            'message': message,
                            'user_email': user_email,
                            'user_name': user_name,
                            'user_id': user_id,
                            '_token': token
                        })
                        .done((result) => {
                            //console.log(result);
                            $('#chat_message').val('');
                        });
                    }, 500);
                });
            }
            else {
                $.post('/test-chat', {
                    'message': message,
                    'user_email': user_email,
                    'user_name': user_name,
                    'user_id': user_id,
                    '_token': token
                })
                .done((result) => {
                    //console.log(result);
                    $('#chat_message').val('');
                });
            }
            
        }
        
    }

    $(() => {
        $('.btn_send_chat').click(() => {
            //console.log('click');
            send_message_chat();
        });

        $('#chat_message').keyup((e) => {
            if(e.keyCode == 13){
                send_message_chat();
            }
        });
    });
</script>
@else
<div class="icon_chat">
    <img src="images/icon_chat.png" alt="">
</div>
<script>
    $(document).ready(function () {
        $(".icon_chat").click(function () {
            $("#myModal").modal();
        });
    });
</script>
@endif