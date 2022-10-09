<div class="container container_thong_tin_ca_nhan">
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        @include('modules.mod_sidebar_profile')
        <div class="col-xs-12 col-md-6">
            
                @if(session('notice_success'))
                <div class="panel panel-success">
                    <div class="panel-heading">
                          <h3 class="panel-title">Thông báo</h3>
                    </div>
                    <div class="panel-body">
                        {{ session('notice_success') }}
                    </div>
                </div>
                @endif
            
            <div class="row row_1">
                <div class="col-xs-12 col-md-6">
                    <div class="image_user">
                        <img src="images/no_image.png" alt="">
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="contain_block_input">
                        <div class="label">
                            Họ tên:
                        </div>
                        <div class="include_input">
                            <input type="text" name="ho_ten" id="ho_ten" class="form-control" value="{{$thong_tin_ca_nhan->ho_ten}}" />
                        </div>
                    </div>
                    <div class="contain_block_input">
                        <div class="label">
                            Email:
                        </div>
                        <div class="include_input">
                            <input type="text" name="email" readonly id="email_form" class="form-control" value="{{$thong_tin_ca_nhan->email}}" />
                            <script>
                                $(() => {
                                    $('#email_form').keyup(function (e) { 
                                        e.preventDefault();
                                        //$('#email_form').val('');
                                    });
                                    $('#email_form').keydown(function (e) { 
                                        e.preventDefault();
                                        //$('#email_form').val('');
                                    });
                                    $('#email_form').keypress(function (e) { 
                                        e.preventDefault();
                                        //$('#email_form').val('');
                                    });
                                })
                            </script>
                        </div>
                        <div class="contain_block_input">
                            <div class="label">
                                Số điện thoại:
                            </div>
                            <div class="include_input">
                                <input type="text" name="dien_thoai" id="dien_thoai" class="form-control" value="{{$thong_tin_ca_nhan->dien_thoai}}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row_2">
                <div class="col-xs-12">
                    <div class="contain_block_input">
                        <div class="label">
                            Địa chỉ
                        </div>
                        <div class="include_input">
                            <input type="text" name="dia_chi" id="dia_chi" class="form-control" value="{{$thong_tin_ca_nhan->dia_chi}}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row_3">
                <div class="col-xs-12">
                    <div class="contain_block_input">
                        <button type="submit" class="btn btn-primary">
                            Lưu thông tin
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>