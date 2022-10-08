@extends('templates.template_admin')

@section('main-content')
    <!--overview start-->

    @if(session('NoticeSuccess'))
        <script>
            alert('{{ session('NoticeSuccess') }}');
        </script>
    @endif
    
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-table"></i> Table</h3>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                <li><i class="fa fa-th-list"></i>Trang Danh sách Đơn Hàng</li>
            </ol>
        </div>
    </div>
    <!-- page start-->
    <div class="row">
        @csrf
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    <a>Trang Danh sách Đơn Hàng</a>
                </header>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
    
                <table class="table table-striped table-advance table-hover">
                    <thead>
                        <tr>
                            <th><i class="icon_profile"></i> ID</th>
                            <th><i class="icon_calendar"></i> Họ tên</th>
                            <th><i class="icon_mail_alt"></i> Email</th>
                            <th><i class="icon_pin_alt"></i> Tổng Tiền</th>
                            <th><i class="icon_pin_alt"></i> Trạng thái</th>
                            <th><i class="icon_cogs"></i> Hành Động</th>
                        </tr>
                    </thead>
                    <tbody class="data_ds_sach">
                        {{-- @foreach($ds_don_hang as $don_hang)
                        <tr>
                            <td>{{$don_hang->id}}</td>
                            <td>{{$don_hang->ho_ten_nguoi_nhan}}</td>
                            <td>{{$don_hang->email_nguoi_nhan}}</td>
                            <td>{{$don_hang->tong_tien}}</td>
                            <td>{{$status_don_hang[$don_hang->trang_thai]}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                                    <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                    <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        {{-- <li class="page-item @if($cur_page <= 0) disabled @endif"><a class="page-link" href="/admin/ql-sach/?page=0">First</a></li>
                        <li class="page-item @if($cur_page <= 0) disabled @endif">
                            <a class="page-link" href="/admin/ql-sach/?page={{($cur_page - 1 > 0)?$cur_page - 1:0}}">Previous</a>
                        </li> --}}

                        <li class="page-item"><a class="page-link" onclick="process_click_change_page(0)">First</a></li>
                        <li class="page-item">
                            <a class="page-link" onclick="btn_prev_click()">Previous</a>
                        </li>
                        
                        {{-- @if($cur_page > 2) --}}
                        <li class="page-item disabled etc_first"><a class="page-link">...</a></li>
                        {{-- @endif --}}
                    </ul>
                    <ul class="pagination list_item_page">
                        {{-- @for($i = 0; $i < $so_trang; $i++) --}}
                            {{-- @if($i >= $cur_page - 2 && $i <= $cur_page + 2 ) --}}
                            {{-- <li class="page-item"><a class="page-link process_load_page"  data-load-page="{{$i}}">{{$i + 1}}</a></li> --}}
                            {{-- @endif --}}
                        {{-- @endfor --}}
                    </ul>
                    <ul class="pagination">
                        {{-- @if($cur_page < $so_trang - 3) --}}
                        <li class="page-item disabled etc_last"><a class="page-link">...</a></li>
                        {{-- @endif --}}

                        {{-- <li class="page-item @if($cur_page >= $so_trang - 3) disabled @endif">
                            <a class="page-link" href="/admin/ql-sach/?page={{($cur_page + 1 < $so_trang - 1)?$cur_page + 1:$so_trang - 1}}">Next</a>
                        </li>
                        <li class="page-item @if($cur_page >= $so_trang - 3) disabled @endif"><a class="page-link" href="/admin/ql-sach/?page={{$so_trang - 1}}">Last</a></li> --}}

                        <li class="page-item">
                            <a class="page-link" onclick="btn_next_click()">Next</a>
                        </li>
                        <li class="page-item"><a class="page-link"  onclick="process_click_change_page({{$so_trang - 1}})">Last</a></li>
                    </ul>
                </nav>
            </section>
            <script>
                var status_array = '{!!json_encode($status_don_hang, true)!!}';
                status_array = JSON.parse(status_array);

                //console.log($('input[name="_token"]').val());

                function process_update_status(event, id_don_hang){
                    //console.log(id_don_hang, event.target.value);
                    
                    $.post('/api/don-hang/trang-thai/' + id_don_hang, { trang_thai: event.target.value, _token: $('input[name="_token"]').val() })
                        .then((data) => {
                            //console.log(data);
                            if(data.message == 'done'){
                                alert('Đã cập nhật trạng thái');
                            }
                        })
                }

                function create_html_select(id_don_hang, selected_value){
                    result_html = '<select onchange="process_update_status(event, '+ id_don_hang +')">';

                    for(var i = 0; i < status_array.length; i++){
                        var class_status = '';
                        if(i == selected_value){
                            class_status = 'selected'
                        }
                        result_html += `
                            <option ${class_status} value='${i}'>
                                ${status_array[i]}
                            </option>
                        `;
                    }

                    result_html += '</select>';
                    return result_html;
                }


                var cur_page = 0;
                var so_trang = {{$so_trang}};

                function process_load_page(page_load){
                    console.log(page_load);

                    $.get('/admin/ql-don-hang/pagination/' + page_load)
                        .then((data) => {

                            //console.log(data);
                            if(data.length > 0)
                            {
                                var html = ''
                                for(var i = 0; i < data.length; i++){
                                    var element = `
                                    <tr>
                                        <td>${data[i].id}</td>
                                        <td>${data[i].ho_ten_nguoi_nhan}</td>
                                        <td>${data[i].email_nguoi_nhan}</td>
                                        <td>${data[i].tong_tien}</td>
                                        <td>
                                            ${create_html_select(data[i].id, data[i].trang_thai)}    
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                                                <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a>
                                                <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                                            </div>
                                        </td>
                                    </tr>`;
                                    html += element;
                                }

                                $('.data_ds_sach').html(html);
                            }
                            
                        })

                    cur_page = page_load;
                    change_item_pagination();
                }

                function process_click_change_page(page){
                    process_load_page(page);
                };

                function btn_next_click(){
                    if(cur_page < so_trang - 1){
                        process_load_page(cur_page + 1);
                    }
                }

                function btn_prev_click(){
                    if(cur_page > 0){
                        process_load_page(cur_page - 1);
                    }
                }

                function change_item_pagination(){
                    var html = '';
                    for(var i = 0; i < so_trang; i++){
                        if(i >= cur_page - 2 && i <= cur_page + 2){
                            html += `<li class="page-item"><a class="page-link process_load_page" 
                                onclick="process_click_change_page(${i})" 
                                data-load-page="${i}">${i + 1}</a></li>`
                        }
                    }

                    if(cur_page - 2 > 0){
                        $('.etc_first').addClass('active');
                    }
                    else {
                        $('.etc_first').removeClass('active');
                    }

                    if(cur_page + 2 < so_trang - 1){
                        $('.etc_last').addClass('active');
                    }
                    else {
                        $('.etc_last').removeClass('active');
                    }


                    $('.list_item_page').html(html);
                }

                $(() => {
                    process_load_page(0);
                })
            </script>
        </div>
    </div>
    <!-- page end-->
@stop