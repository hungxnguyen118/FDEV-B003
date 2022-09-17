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
                <li><i class="fa fa-th-list"></i>Trang Danh sách Sách</li>
            </ol>
        </div>
    </div>
    <!-- page start-->
    <div class="row">
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    <a href="/admin/ql-sach">Trang Danh sách Sách</a>
                    /
                    <a>
                        Danh sách trong thùng rác
                    </a>
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
                            <th><i class="icon_calendar"></i> Tên sách</th>
                            <th><i class="icon_mail_alt"></i> Hình</th>
                            <th><i class="icon_pin_alt"></i> Đơn giá</th>
                            <th><i class="icon_mobile"></i> Giá Bìa</th>
                            <th><i class="icon_cogs"></i> Hành Động</th>
                        </tr>
                    </thead>
                    <tbody class="data_ds_sach">
                        {{-- @foreach($ds_sach as $sach)
                        <tr>
                            <td>{{$sach->id}}</td>
                            <td>{{$sach->ten_sach}}</td>
                            <td><img class="image_sach" src="/images/sach/{{$sach->hinh}}" alt=""></td>
                            <td>{{$sach->don_gia}}</td>
                            <td>{{$sach->gia_bia}}</td>
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
                        <li class="page-item @if($cur_page <= 0) disabled @endif"><a class="page-link" href="/admin/ql-sach/?page=0">First</a></li>
                        <li class="page-item @if($cur_page <= 0) disabled @endif">
                            <a class="page-link" href="/admin/ql-sach/?page={{($cur_page - 1 > 0)?$cur_page - 1:0}}">Previous</a>
                        </li>
                        
                        @if($cur_page > 2)
                        <li class="page-item disabled"><a class="page-link">...</a></li>
                        @endif

                        @for($i = 0; $i < $so_trang; $i++)
                            {{-- @if($i >= $cur_page - 2 && $i <= $cur_page + 2 ) --}}
                            <li class="page-item"><a class="page-link process_load_page"  data-load-page="{{$i}}">{{$i + 1}}</a></li>
                            {{-- @endif --}}
                        @endfor
                        
                        @if($cur_page < $so_trang - 3)
                        <li class="page-item disabled"><a class="page-link">...</a></li>
                        @endif

                        <li class="page-item @if($cur_page >= $so_trang - 3) disabled @endif">
                            <a class="page-link" href="/admin/ql-sach/?page={{($cur_page + 1 < $so_trang - 1)?$cur_page + 1:$so_trang - 1}}">Next</a>
                        </li>
                        <li class="page-item @if($cur_page >= $so_trang - 3) disabled @endif"><a class="page-link" href="/admin/ql-sach/?page={{$so_trang - 1}}">Last</a></li>
                    </ul>
                </nav>
            </section>
            <script>
                $(() => {
                    function process_load_page(page_load){
                        console.log(page_load);

                        $.get('/admin/ql-sach/thung-rac/pagination/' + page_load)
                            .then((data) => {

                                //console.log(data);
                                if(data.length > 0)
                                {
                                    var html = ''
                                    for(var i = 0; i < data.length; i++){
                                        var element = `
                                        <tr>
                                            <td>${data[i].id}</td>
                                            <td>${data[i].ten_sach}</td>
                                            <td><img class="image_sach" src="/images/sach/${data[i].hinh}" alt=""></td>
                                            <td>${data[i].don_gia}</td>
                                            <td>${data[i].gia_bia}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-success" href="/admin/ql-sach/thung-rac/refresh/${data[i].id}"><i class="icon_refresh"></i> Phục hồi</a>
                                                    <a class="btn btn-danger" onclick="return confirm_delete();" href="/admin/ql-sach/thung-rac/delete/${data[i].id}"><i class="icon_trash_alt"></i> Xóa hẳn</a>
                                                </div>
                                            </td>
                                        </tr>`;
                                        html += element;
                                    }

                                    $('.data_ds_sach').html(html);
                                }
                                
                            })
                    }

                    $('.process_load_page').click((e) => {
                        // console.log(e);
                        // console.log($(e.target).attr('data-load-page'));
                        //console.log($(e.target).attr('data-load-page'));
                        process_load_page($(e.target).attr('data-load-page'));
                    });

                    process_load_page(0);
                })
            </script>
        </div>
    </div>
    <!-- page end-->
@stop