<div class="col-md-5 col-lg-5 form_thanh_toan">
    @csrf
    <div class="form-group">
        <legend>Thông tin người nhận sách</legend>
    </div>
    {{-- <input type="hidden" name="id_nguoi_dung" value="1"> --}}
    @if(count($errors->all()) > 0)
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Bạn vui lòng xem lại các lỗi sau:</h3>
            </div>
            <div class="panel-body">
                @foreach($errors->all() as $error)
                    <div class="error text-danger">
                        {{$error}}
                    </div>
                @endforeach
            </div>
    </div>
    @endif
    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="thong_tin_nguoi_dung" id="thong_tin_nguoi_dung">
                    Nếu thông tin người nhận chính là bạn
                </label>
            </div>

        </div>
    </div>
    <script>
        var ttnd = JSON.parse('{"id":"1","tai_khoan":"admin","mat_khau":"e10adc3949ba59abbe56e057f20f883e","id_loai_user":"7","id_phan_quyen":null,"ho_ten":"H\u00f9ng Nguy\u1ec5n","email":"hungnguyenxuan118@gmail.com","ngay_sinh":"11-8","dia_chi":"asd asdas asd asdas das","diem_tich_luy":null,"ngay_dang_ky":null,"thoi_gian_dang_nhap":null,"active_code":null,"avatar":null,"so_lan_reset":null,"dien_thoai":"0909090909"}');
        $(document).ready(function () {
            $("#thong_tin_nguoi_dung").click(function () {
                $("#ho_ten").val(ttnd.ho_ten);
                $("#email").val(ttnd.email);
                $("#dien_thoai").val(ttnd.dien_thoai);
                $("#dia_chi").val(ttnd.dia_chi);
            });
        });
    </script>
    <div class="form-group">
        <div class="col-md-3">
            Họ tên:
        </div>
        <div class="col-md-9">
            <input type="text" name="ho_ten" id="ho_ten" class="form-control" value="" title="">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
            Email:
        </div>
        <div class="col-md-9">
            <input type="text" name="email" id="email" class="form-control" value="" title="">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
            Điện thoại:
        </div>
        <div class="col-md-9">
            <input type="text" name="dien_thoai" id="dien_thoai" class="form-control" value=""
                title="">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
            Địa chỉ:
        </div>
        <div class="col-md-9">
            <input type="text" name="dia_chi" id="dia_chi" class="form-control" value=""
                title="">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-9 col-sm-offset-3">
            <button type="submit" class="btn btn-primary" style="padding: 5px 30px">Thanh Toán</button>
        </div>
    </div>
</div>