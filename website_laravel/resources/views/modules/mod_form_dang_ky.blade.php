<section class="container-fluid">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div id="image-holder"></div>
        <img id="avatar_image" style="width: 100%;" src="images/no_image.png">
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        {!! Form::open(['route' => 'dang_ky_post']) !!}
            <div class="form-group">
                <legend>Đăng ký làm thành viên</legend>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Họ tên
                </div>
                <div class="col-md-9">
                    <input type="text" name="ho_ten" id="ho_ten" class="form-control" value="" required="required"
                        title="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Tài khoản
                </div>
                <div class="col-md-9">
                    <input type="text" name="tai_khoan" id="tai_khoan" class="form-control" value="" required="required"
                        title="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Email
                </div>
                <div class="col-md-9">
                    <input type="text" name="email" id="email" class="form-control" value="" required="required"
                        title="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Mật khẩu
                </div>
                <div class="col-md-9">
                    <input type="password" name="mat_khau" id="mat_khau" class="form-control" value=""
                        required="required" title="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Xác nhận mật khẩu
                </div>
                <div class="col-md-9">
                    <input type="password" name="re_mat_khau" id="re_mat_khau" class="form-control" value=""
                        required="required" title="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Chọn hình Avatar
                </div>
                <div class="col-md-9">
                    <input id="fileUpload" name="avatar" type="file">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Ngày sinh
                </div>
                <div class="col-md-9">
                    <input type="date" name="ngay_sinh" id="ngay_sinh" class="form-control" value="" required="required"
                        title="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Điện thoại
                </div>
                <div class="col-md-9">
                    <input type="text" name="dien_thoai" id="dien_thoai" class="form-control" value=""
                        required="required" title="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    Địa chỉ
                </div>
                <div class="col-md-9">
                    <input type="text" name="dia_chi" id="dia_chi" class="form-control" value="" required="required"
                        title="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-primary" style="padding: 5px 30px">Đăng ký</button>
                </div>
            </div>
        {!!Form::close()!!}
    </div>
</section>