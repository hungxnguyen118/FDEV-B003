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
    
    <div class="container_chat_support">



    </div>

    <script>
        var user_email = "{{session('user_info')->email}}";
        var user_name = "{{session('user_info')->ho_ten}}";

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('e836754de27fb45a4173', {
        cluster: 'mt1'
        });

        var channel = pusher.subscribe('my-channel');

        channel.bind('create-room', function(data) {
            //console.log((JSON.stringify(data)));
            channel.bind(data.user_email, function(data) {
                console.log((JSON.stringify(data)));
            })
        })

        // setTimeout(() => {
        //     channel.bind(user_email, function(data) {
        //         console.log((JSON.stringify(data)));
        //     })
        // }, 2000);

        
        

        // channel.bind(user_email, function(data) {
        //     //alert(JSON.stringify(data));
        //     var class_self = '';
        //     var subhtml = '';
        //     if(data.user_email == user_email){
        //         class_self = ' myself'
        //     }
        //     else {
        //         subhtml = `<div class="ho_ten_nguoi_chat">${data.user_name}</div>`
        //     }

        //     var html = `
        //     <div class="item_chat ${class_self}">
        //         ${subhtml}
        //         ${data.message}
        //     </div>
        //     `;

            
        //     $('.list_message_chat').append(html);

        //     $('.form_chat').scrollTop($('.list_message_chat')[0].scrollHeight);
            
        // });
    </script>
</div> 
<!-- project team & activity end -->
@stop